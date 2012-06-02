<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'employees-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
		
		<div class="row">
		<?php echo $form->labelEx($model,'Select firm'); ?>
		<?php echo CHtml::dropDownList('firm_id',$model->office?$model->office->firm_id:null, GxHtml::listDataEx(Firm::model()->findAllAttributes(null, true)),
                array(
                    'prompt'=>'Select Firm',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('employees/UpdateOffice'), 
                        'data'=>array('firm_id'=>'js:this.value'),  
                        'update'=>'#Employees_office_id',
                    )));
			?>
		</div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'Select office'); ?>
		<?php echo CHtml::dropDownList('Employees[office_id]',strval($model->office_id), array($model->office_id => ($model->office?$model->office->name:null))); ?>
		<?php echo $form->error($model,'office_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->checkBox($model, 'current_position'); ?>
		<?php echo $form->error($model,'current_position'); ?>Currently hold this position
		<?php echo $form->checkBox($model, 'archived_position'); ?>
		<?php echo $form->error($model,'archived_position'); ?>Archived this position
		
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'first name'); ?>
		<?php echo $form->textField($model, 'first_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'last name'); ?>
		<?php echo $form->textField($model, 'last_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->

		<hr />
		
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'position', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'position'); ?>
		</div><!-- row -->
		<div class="row2">
		<?php echo $form->labelEx($model,'phone_office'); ?>
		<?php echo $form->textField($model, 'phone_office', array('maxlength' => 50)); ?>ext&nbsp;<?php echo $form->textField($model, 'phone_office_ext', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'phone_office'); ?>
		</div><!-- row -->
		<!-- row -->
		<div class="row2">
		<?php echo $form->labelEx($model,'phone_mobile'); ?>
		<?php echo $form->textField($model, 'phone_mobile', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone_mobile'); ?>
		</div><!-- row -->
		<div class="row2">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model, 'fax', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'fax'); ?>
		</div><!-- row -->
		<div class="row2">
		<?php echo $form->labelEx($model,'phone_home'); ?>
		<?php echo $form->textField($model, 'phone_home', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone_home'); ?>
		</div><!-- row -->
		<div class="row2">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model, 'skype', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'skype'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'include a personal note'); ?>
		<?php echo $form->textArea($model, 'personal_note'); ?>
		<?php echo $form->error($model,'personal_note'); ?>
		</div><!-- row -->
		<hr/>
		<h2>Main interests</h2>
		<script type="text/javascript">
		function continentClick(c){
			if(c.checked) {

					jQuery.ajax({'type':'POST','url':'<?php echo CController::createUrl("employees/ListRegions") ?>','dataType':'json','data':{'continent_id':c.value},'success':function(data) {
						
						var regchks = document.getElementsByName("employeesregions[]");
						
						for(var i=0; i<data.regions.length; i++){
							for(var j=0; j<regchks.length; j++){
								if(regchks[j].value == data.regions[i]){
									regchks[j].checked = true;
									break;
								}
							}
						}
					},'cache':false});
				
			}
		}
		</script>
		<div style="float:left; margin-left:20px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("employeescontinents", CHtml::listData($model->employeescontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick'=>'continentClick(this)')); ?>
			</div>
		</div>
		
		<div style="float:left; margin-left:20px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("employeesregions", CHtml::listData($model->employeesregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; margin-left:20px;">
			<label>Sections</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("employeessectors", CHtml::listData($model->employeessectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
        <div class="clearfix"></div>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
