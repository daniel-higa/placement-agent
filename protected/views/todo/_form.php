<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'todo-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
        <?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php  $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date',
			'value' => $model->create_at,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			)); ?>
		<?php echo $form->error($model,'date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'communication_id'); ?>
		<?php echo $form->textField($model, 'communication_id'); ?>
		<?php echo $form->error($model,'communication_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'done'); ?>
		<?php echo $form->checkBox($model, 'done'); ?>
		<?php echo $form->error($model,'done'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
