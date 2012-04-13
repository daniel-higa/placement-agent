<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'firm-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'Please enter company name:'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Who is responsible?'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Please define company profile:'); ?>
		<?php echo $form->dropDownList($model, 'firmtype_id', GxHtml::listDataEx(Firmtype::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'firmtype_id'); ?>
		</div><!-- row -->
		
		<div>
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("firmcontinents", CHtml::listData($model->firmcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="display: block; margin-top: -50px; margin-left:200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("firmregions", CHtml::listData($model->firmregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		
		<input type="radio" id="Firm_rank" name="Firm[rank]" value="A" checked="checked" />A
		<input type="radio" id="Firm_rank" name="Firm[rank]" value="B" />B
		<input type="radio" id="Firm_rank" name="Firm[rank]" value="C" />C
		<input type="radio" id="Firm_rank" name="Firm[rank]" value="D" />D
		<input type="radio" id="Firm_rank" name="Firm[rank]" value="E" />E
		
		<?php echo $form->error($model,'rank'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Please enter the description of de firm'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model, 'website', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'website'); ?>
		</div><!-- row -->
		
		
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
		
		$arr = $model->firmdocuments;
		for( $i = 0; $i < count($arr); $i++)
		{
			echo '<div id="div_doc'.$arr[$i]['id'].'"><b>'.($i+1).')&nbsp; </b><a target="_blank" href="upload/'.$arr[$i]['file'].'">'.$arr[$i]['file'].'</a>&nbsp;<img style="cursor:pointer" onclick="documentDelete('.$arr[$i]['id'].')" src="assets/460db63c/gridview/delete.png"></div><br>';
		}
		
		?>
		<br />
		Add Document
		<?php
		  $this->widget('CMultiFileUpload', array(
			 'name'=>'firmfiles',
			 'attribute'=>'firmfiles',
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

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->