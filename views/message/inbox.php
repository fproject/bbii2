<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\UrlManager;

use frontend\modules\bbii\AppAsset;
$assets = AppAsset::register($this);

/* @var $this MessageController */
/* @var $model BbiiMessage */
/* @var $count Array */

$this->context->bbii_breadcrumbs = array(
	Yii::t('BbiiModule.bbii', 'Forum') => array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Inbox'),
);

$item = array(
	array('label' => Yii::t('BbiiModule.bbii', 'Inbox') 	.' ('. $count['inbox'] .')', 	'url' => array('message/inbox')),
	array('label' => Yii::t('BbiiModule.bbii', 'Outbox') 	.' ('. $count['outbox'] .')', 	'url' => array('message/outbox')),
	array('label' => Yii::t('BbiiModule.bbii', 'New message'), 								'url' => array('message/create'))
);
?>
<div id = "bbii-wrapper">
	<?php echo $this->render('_header', array('item' => $item)); ?>
	
	<div class = "progress"><div class = "progressbar" style = "width:<?php echo ($count['inbox'] < 100)?$count['inbox']:100; ?>%"> </div></div>

	<?php // @depricated 2.1.5 Kept for referance
	/*$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'inbox-grid',
		'dataProvider' => $model->search(),
		'rowCssClassExpression' => '($data->read_indicator)?"":"unread"',
		'columns' => array(
			array(
				'name' => 'sendfrom',
				'value' => '$data->sender->member_name'
			),
			'subject',
			array(
				'name' => 'create_time',
				'value' => 'DateTimeCalculation::long($data->create_time)',
			),
			array(
				'name' => 'type',
				'value' => '($data->type)?Yii::t("bbii", "notification"):Yii::t("bbii", "message")',
			),
			array(
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}{reply}{delete}',
				'buttons' => array(
					'view' => array(
						'url' => '$data->id',
						'imageUrl' => $assets->baseUrl.'view.png',
						'click' => 'js:function() { viewMessage($(this).attr("href"), "' . Yii::$app->urlManager->createAbsoluteUrl('message/view') .'");return false; }',
					),
					'reply' => array(
						'url' => 'array("reply", "id" => $data->id)',
						'label' => Yii::t('BbiiModule.bbii','Reply'),
						'imageUrl' => $assets->baseUrl.'reply.png',
						'options' => array('style' => 'margin-left:5px;'),
					),
					'delete' => array(
						'imageUrl' => $assets->baseUrl.'/images/delete.png',
						'options' => array('style' => 'margin-left:5px;'),
					),
				)
			),
		),
	));*/ ?>

	<?php echo GridView::widget(array(
		'columns'      => array(
			array(
				'attribute' => 'sendfrom',
				'value'     => 'sendfrom'
			),
			'subject',
			array(
				'attribute' => 'create_time',
				'value'     => 'create_time',
			),
			array(
				'attribute' => 'type',
				'value'     =>  'type',
			),

			[
				'class'    => 'yii\grid\ActionColumn',
				'template' => '{view}{delete}',
			]),
		'dataProvider' => $model,
		'id'           => 'inbox-grid',
	)); ?>

	<div id = "bbii-message"></div>

</div>