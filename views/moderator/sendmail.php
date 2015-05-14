﻿<?php
/* @var $this ModeratorController */
/* @var $model MailForm */

$this->context->bbii_breadcrumbs = array(
	Yii::t('BbiiModule.bbii', 'Forum') => array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Send mail'),
);

$approvals = BbiiPost::find()->unapproved()->count();
$reports = BbiiMessage::find()->report()->count();

$item = array(
	array('label' => Yii::t('BbiiModule.bbii', 'Forum'), 'url' => array('forum/index')),
	array('label' => Yii::t('BbiiModule.bbii', 'Members'), 'url' => array('member/index')),
	array('label' => Yii::t('BbiiModule.bbii', 'Approval'). ' (' . $approvals . ')', 'url' => array('moderator/approval'), 'visible' => $this->context->isModerator()),
	array('label' => Yii::t('BbiiModule.bbii', 'Reports'). ' (' . $reports . ')', 'url' => array('moderator/report'), 'visible' => $this->context->isModerator()),
	array('label' => Yii::t('BbiiModule.bbii', 'Posts'), 'url' => array('moderator/admin'), 'visible' => $this->context->isModerator()),
	array('label' => Yii::t('BbiiModule.bbii', 'Blocked IP'), 'url' => array('moderator/ipadmin'), 'visible' => $this->context->isModerator()),
	array('label' => Yii::t('BbiiModule.bbii', 'Send mail'), 'url' => array('moderator/sendmail'), 'visible' => $this->context->isModerator()),
);
?>

<div id = "bbii-wrapper">
	<?php echo $this->render('_header', array('item' => $item)); ?>

	<?php echo $this->render('_form', array('model' => $model)); ?>

</div>