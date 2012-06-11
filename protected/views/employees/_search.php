<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('firm_name', 'firm name'); ?>
		<?php echo CHtml::textField('firm_name', '', array('maxlength' => 100)); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model, 'first_name'); ?>
		<?php echo $form->textField($model, 'first_name', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'last_name'); ?>
		<?php echo $form->textField($model, 'last_name', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone_office'); ?>
		<?php echo $form->textField($model, 'phone_office', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'position'); ?>
		<?php echo $form->textField($model, 'position', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'biography'); ?>
		<?php echo $form->textField($model, 'biography', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'personal_note'); ?>
		<?php echo $form->textField($model, 'personal_note', array('maxlength' => 100)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
