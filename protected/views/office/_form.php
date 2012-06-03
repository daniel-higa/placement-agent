<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'office-form',
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
		<?php echo $form->labelEx($model,'firm_id'); ?>
		<?php echo $form->dropDownList($model, 'firm_id', GxHtml::listDataEx(Firm::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'firm_id'); ?>
		</div><!-- row -->
		<!--
		<div>
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("officecontinents", CHtml::listData($model->officecontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="display: block; margin-top: -50px; margin-left:200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("officeregions", CHtml::listData($model->officeregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		-->
		<div class="row">
		<?php echo $form->labelEx($model,'main_office'); ?>
		<?php echo $form->checkBox($model, 'main_office'); ?>
		<?php echo $form->error($model,'main_office'); ?>
		</div><!-- row -->
		<hr />
		<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)),array('onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'country_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		
		<?php echo $form->hiddenField($model, 'sync_gmaps', array('value' => 0)); ?>
		

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
