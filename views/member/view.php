<?php
/* @var $this MemberController */
/* @var $model BbiiMember */
/* @var $dataProvider CActiveDataProvider BbiiPost */
/* @var $topicProvider CActiveDataProvider BbiiTopic*/

$this->bbii_breadcrumbs = array(
	Yii::t('BbiiModule.bbii', 'Forum') => array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Members') => array('member/index'),
	$model->member_name . Yii::t('BbiiModule.bbii', '\'s profile'),
);

$item = array(
	array('label' => Yii::t('BbiiModule.bbii', 'Forum'), 'url' => array('forum/index')),
	array('label' => Yii::t('BbiiModule.bbii', 'Members'), 'url' => array('member/index')),
	array('label' => Yii::t('BbiiModule.bbii', 'Approval'), 'url' => array('moderator/approval'), 'visible' => $this->isModerator()),
	array('label' => Yii::t('BbiiModule.bbii', 'Posts'), 'url' => array('moderator/admin'), 'visible' => $this->isModerator()),
);

$df = Yii::$app->dateFormatter;
?>

<?php if(Yii::$app->user->hasFlash('notice')): ?>
<div class = "flash-notice">
	<?php echo Yii::$app->user->getFlash('notice'); ?>
</div>
<?php endif; ?>

<div id = "bbii-wrapper">
	<?php echo $this->render('_header', array('item' => $item)); ?>
	
	<?php if($this->isModerator() || $model->id == Yii::$app->user->id): ?>
	<?php echo CHtml::htmlButton(Yii::t('BbiiModule.bbii', 'Edit profile'), array('class' => 'bbii-button-right', 'onclick' => 'js:document.location.href = "' . $this->createAbsoluteUrl('member/update', array('id' => $model->id)) .'"')); ?>
	<?php endif; ?>
	
	<div class = "bbii-box-top"><?php echo CHtml::encode($model->member_name) . Yii::t('BbiiModule.bbii', '\'s profile'); ?></div>
	<table class = "profile"><tr><td>
		<table><tr>
			<td style = "width:90px" rowspan = "4"><?php echo CHtml::image((isset($model->avatar))?(Yii::$app->request->baseUrl . $this->module->avatarStorage . '/'. $model->avatar):$this->module->getRegisteredImage('empty.jpeg'), 'avatar'); ?></td>
			<td style = "width:200px"><strong><?php echo Yii::t('BbiiModule.bbii', 'Member since'); ?></strong></td>
			<td><?php echo $df->formatDateTime($model->first_visit, 'long', 'medium'); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo Yii::t('BbiiModule.bbii', 'Last visit'); ?></strong></td>
			<td><?php echo $df->formatDateTime($model->last_visit, 'long', 'medium'); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo Yii::t('BbiiModule.bbii', 'Number of posts'); ?></strong></td>
			<td><?php echo CHtml::encode($model->posts); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo Yii::t('BbiiModule.bbii', 'Reputation'); ?></strong></td>
			<td><?php echo CHtml::encode($model->upvoted); ?></td>
		</tr>
		<tr>
			<th style = "text-align:center;"><?php echo CHtml::encode($model->member_name); ?></th>
			<td><strong><?php echo Yii::t('BbiiModule.bbii', 'Group'); ?></strong></td>
			<td><?php if(isset($model->group)) echo CHtml::encode($model->group->name); ?></td>
		</tr>
		<tr>
			<td></td>
			<th><?php echo Yii::t('BbiiModule.bbii', 'Location'); ?></th>
			<td><?php echo (isset($model->location))?CHtml::encode($model->location):Yii::t('BbiiModule.bbii', 'Unknown'); ?></td>
		</tr>
		<tr>
			<td></td>
			<th><?php echo Yii::t('BbiiModule.bbii', 'Birthdate'); ?></th>
			<td><?php echo (isset($model->birthdate))?$df->formatDateTime($model->birthdate, 'long', null):Yii::t('BbiiModule.bbii', 'Unknown'); ?></td>
		</tr>
		<tr>
			<td></td>
			<th><?php echo Yii::t('BbiiModule.bbii', 'Gender'); ?></th>
			<td><?php echo (isset($model->gender))?(($model->gender)?Yii::t('BbiiModule.bbii', 'Female'):Yii::t('BbiiModule.bbii', 'Male')):Yii::t('BbiiModule.bbii', 'Unknown'); ?></td>
		</tr>
		<tr>
			<td></td>
			<th><?php echo Yii::t('BbiiModule.bbii', 'Presence on the internet'); ?></th>
			<td>
				<?php if($model->contact_email && $this->module->userMailColumn) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('User.png'), 'e-mail', array('title' => Yii::t('BbiiModule.bbii', 'Contact user by e-mail'))), array('member/mail', 'id' => $model->id)); ?>
				<?php if(isset($model->blogger)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Blogger.png'), 'Blogger', array('title' => 'Blogger')), $model->blogger, array('target' => '_blank')); ?>
				<?php if(isset($model->facebook)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Facebook.png'), 'Facebook', array('title' => 'Facebook')), $model->facebook, array('target' => '_blank')); ?>
				<?php if(isset($model->flickr)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Flickr.png'), 'Flickr', array('title' => 'Flickr')), $model->flickr, array('target' => '_blank')); ?>
				<?php if(isset($model->google)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Google.png'), 'Google', array('title' => 'Google')), $model->google, array('target' => '_blank')); ?>
				<?php if(isset($model->linkedin)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Linkedin.png'), 'Linkedin', array('title' => 'Linkedin')), $model->linkedin, array('target' => '_blank')); ?>
				<?php if(isset($model->metacafe)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Metacafe.png'), 'Metacafe', array('title' => 'Metacafe')), $model->metacafe, array('target' => '_blank')); ?>
				<?php if(isset($model->myspace)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Myspace.png'), 'Myspace', array('title' => 'Myspace')), $model->myspace, array('target' => '_blank')); ?>
				<?php if(isset($model->orkut)) 		echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Orkut.png'), 'Orkut', array('title' => 'Orkut')), $model->orkut, array('target' => '_blank')); ?>
				<?php if(isset($model->tumblr)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Tumblr.png'), 'Tumblr', array('title' => 'Tumblr')), $model->tumblr, array('target' => '_blank')); ?>
				<?php if(isset($model->twitter)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Twitter.png'), 'Twitter', array('title' => 'Twitter')), $model->twitter, array('target' => '_blank')); ?>
				<?php if(isset($model->website)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Globe.png'), 'Website', array('title' => 'Website')), $model->website, array('target' => '_blank')); ?>
				<?php if(isset($model->wordpress)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Wordpress.png'), 'Wordpress', array('title' => 'Wordpress')), $model->wordpress, array('target' => '_blank')); ?>
				<?php if(isset($model->yahoo)) 		echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Yahoo.png'), 'Yahoo', array('title' => 'Yahoo')), $model->yahoo, array('target' => '_blank')); ?>
				<?php if(isset($model->youtube)) 	echo Chtml::link(CHtml::image($this->module->getRegisteredImage('Youtube.png'), 'Youtube', array('title' => 'Youtube')), $model->youtube, array('target' => '_blank')); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<th><?php echo Yii::t('BbiiModule.bbii', 'Personal text'); ?></th>
			<td><?php echo CHtml::encode($model->personal_text); ?></td>
		</tr>
		</table>
	</td><td>
		<div class = "header2"><?php echo Yii::t('BbiiModule.bbii','Recent Posts'); ?></div>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider' => $dataProvider,
			'itemView' => '_post',
			'summaryText' => false,
		));
		?>
	</td></tr><tr><td colspan = "2">
		<?php if($topicProvider->getItemCount()) { $this->render('_watch', array('topicProvider' => $topicProvider)); } ?>
	</td></tr></table>
</div>