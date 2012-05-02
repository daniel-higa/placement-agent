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
		<?php echo $form->labelEx($model,'firm_id'); ?>
		<?php 
            if ($model->isNewRecord) {
                echo $form->dropDownList($model, 'firm_id', GxHtml::listDataEx(Firm::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' ));
            } else {
                echo $model->firm->name;
            }
        ?>
		<?php echo $form->error($model,'firm_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_mandate_id'); ?>
		<?php echo $form->dropDownList($model, 'client_mandate_id', GxHtml::listDataEx(ClientMandate::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'client_mandate_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employees_id'); ?>
        <?php
              $emp_list = Employees::model()->findAllAttributes(null, true);
        ?>
		<?php echo $form->dropDownList($model, 'employees_id', GxHtml::listDataEx($emp_list), array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'employees_id'); ?>
		</div><!-- row -->
        <label><?php echo GxHtml::encode($model->getRelationLabel('tags')); ?></label>
		<?php echo $form->checkBoxList($model, 'tags', GxHtml::encodeEx(GxHtml::listDataEx(Tag::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
