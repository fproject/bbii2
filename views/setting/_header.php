<?php
/* @var $this ForumController */
/* @var $item array */
?>
<div id="bbii-header">
	<?php if(!Yii::$app->user->isGuest): ?>
		<div class="bbii-profile-box">
		<?= Html::a(Yii::t('BbiiModule.bbii', 'Forum'), array('forum/index')); ?>
		</div>
	<?php endif; ?>
	<div class="bbii-title"><?= Yii::t('BbiiModule.bbii', 'Forum settings'); ?></div>
	<table style="margin:0;"><tr><td style="padding:0;">
		<div id="bbii-menu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items' => $item
		)); ?>
		</div>
	</td></tr></table>
</div>
<?php /*
if(isset($this->bbii_breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink' => false,
		'links' => $this->bbii_breadcrumbs,
	)); ?><!-- breadcrumbs -->
<?php endif
*/ ?>