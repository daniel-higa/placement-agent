<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'gp-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row"><h2>Description</h2></div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'firm_id'); ?>
		<?php echo $form->dropDownList($model, 'firm_id', GxHtml::listDataEx(Firm::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'firm_id'); ?>
		</div>
		<!--
			<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model, 'name', array('maxlength' => 50, 'readOnly' =>'true', 'disabled'=> 'true')); ?>
			</div>
			
			<div class="row">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model, 'description', array('readOnly' =>'true', 'disabled'=> 'true')); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'website'); ?>
			<?php echo $form->textField($model, 'website', array('maxlength' => 100, 'readOnly' =>'true', 'disabled'=> 'true')); ?>
			</div>
		-->
		
		<br />
		
		<script type="text/javascript">
		function documentDelete(id){
			E('HD_deleteDocuments').value += (E('HD_deleteDocuments').value != '' ? ';' : '') + id;
			E('div_doc'+id).style.display = 'none';
		}
		function E(id){
			return document.getElementById(id);
		}
		</script>
		
		<label>Documents</label>
		<input type="hidden" id="HD_deleteDocuments" name="HD_deleteDocuments" value="" />
		<?php
		
		$arr = $model->gpdocuments;
		for( $i = 0; $i < count($arr); $i++)
		{
			echo '<div id="div_doc'.$arr[$i]['id'].'"><b>'.($i+1).')&nbsp; </b><a target="_blank" href="upload/'.$arr[$i]['file'].'">'.$arr[$i]['file'].'</a>&nbsp;<img style="cursor:pointer" onclick="documentDelete('.$arr[$i]['id'].')" src="assets/460db63c/gridview/delete.png"></div><br>';
		}
		
		?>
		<br />
		Add Document
		<?php
		  $this->widget('CMultiFileUpload', array(
			 'name'=>'gpfiles',
			 'attribute'=>'gpfiles',
			 'accept'=>'jpg|gif',
			 'options'=>array(
				'onFileSelect'=>'function(e, v, m){  }',
				'afterFileSelect'=>'function(e, v, m){  }',
				'onFileAppend'=>'function(e, v, m){  }',
				'afterFileAppend'=>'function(e, v, m){  }',
				'onFileRemove'=>'function(e, v, m){  }',
				'afterFileRemove'=>'function(e, v, m){  }',
			 ),
		  ));
		?>
		<br />
		<hr />
		
		<div class="row"><h2>Volume And Interests</h2></div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		
		<input type="radio" id="Gp_rank" name="Gp[rank]" value="A" <?php echo $model->rank == 'A' ? 'checked="checked"' : ''; ?> />A
		<input type="radio" id="Gp_rank" name="Gp[rank]" value="B" <?php echo $model->rank == 'B' ? 'checked="checked"' : ''; ?> />B
		<input type="radio" id="Gp_rank" name="Gp[rank]" value="C" <?php echo $model->rank == 'C' ? 'checked="checked"' : ''; ?> />C
		<input type="radio" id="Gp_rank" name="Gp[rank]" value="D" <?php echo $model->rank == 'D' ? 'checked="checked"' : ''; ?> />D
		<input type="radio" id="Gp_rank" name="Gp[rank]" value="E" <?php echo $model->rank == 'E' ? 'checked="checked"' : ''; ?> />E
		
		<?php echo $form->error($model,'rank'); ?>
		</div>
		
		<div>
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("gpcontinents", CHtml::listData($model->gpcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="display: block; margin-top: -50px; margin-left:200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("gpregions", CHtml::listData($model->gpregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="display: block; margin-top: -65px; margin-left:400px;">
			<label>Sections</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("gpsectors", CHtml::listData($model->gpsectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		

		
		<br />

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->