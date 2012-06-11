<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'firmdocument-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model, 'firm_id', array('maxlength' => 10)); ?>
        <div class="row">
		<?php
		  echo CHtml::fileField('file');
		?>
        </div>

<?php
echo GxHtml::submitButton('Save');
$this->endWidget();
?>
</div><!-- form -->
