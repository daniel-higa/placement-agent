<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date'); ?>
		<?php echo $form->textField($model, 'date', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firm_id'); ?>
		<?php echo $form->textField($model, 'firm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gp_id'); ?>
		<?php echo $form->textField($model, 'gp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lp_id'); ?>
		<?php echo $form->textField($model, 'lp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status_id'); ?>
		<?php echo $form->textField($model, 'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'client_mandate_id'); ?>
		<?php echo $form->textField($model, 'client_mandate_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employees_id'); ?>
		<?php echo $form->textField($model, 'employees_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
