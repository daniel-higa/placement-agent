<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'region-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'continent_id'); ?>
        <?php echo $form->dropDownList($model, 'continent_id', GxHtml::listDataEx(Continent::model()->findAllAttributes(null, true)),array('empty' => 'Choose one')); ?>
		<?php echo $form->error($model,'continent_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
