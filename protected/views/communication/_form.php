<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'communication-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'gp_id'); ?>
		<?php echo $form->textField($model, 'gp_id'); ?>
		<?php echo $form->error($model,'gp_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_mandate_id'); ?>
		<?php echo $form->textField($model, 'client_mandate_id'); ?>
		<?php echo $form->error($model,'client_mandate_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employees_id'); ?>
		<?php echo $form->textField($model, 'employees_id'); ?>
		<?php echo $form->error($model,'employees_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->