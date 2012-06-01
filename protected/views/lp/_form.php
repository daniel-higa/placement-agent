<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'lp-form',
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
        
        
        <?php echo $form->labelEx($model,'average_ticket'); ?>
		<?php echo $form->textField($model, 'average_ticket', array('maxlength' => 2)); ?>
		<?php echo $form->error($model,'average_ticket'); ?>
        
        <?php echo $form->labelEx($model,'average_inv'); ?>
		<?php echo $form->textField($model, 'average_inv', array('maxlength' => 2)); ?>
		<?php echo $form->error($model,'average_inv'); ?>
<!--
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		
		<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model, 'website', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'website'); ?>
		</div>-->
		
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
		
		$arr = $model->lpdocuments;
		for( $i = 0; $i < count($arr); $i++)
		{
			echo '<div id="div_doc'.$arr[$i]['id'].'"><b>'.($i+1).')&nbsp; </b><a target="_blank" href="upload/'.$arr[$i]['file'].'">'.$arr[$i]['file'].'</a>&nbsp;<img style="cursor:pointer" onclick="documentDelete('.$arr[$i]['id'].')" src="assets/460db63c/gridview/delete.png"></div><br>';
		}
		
		?>
		<br />
		Add Document
		<?php
		  $this->widget('CMultiFileUpload', array(
			 'name'=>'lpfiles',
			 'attribute'=>'lpfiles',
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
		
		<input type="radio" id="Lp_rank" name="Lp[rank]" value="A" <?php echo $model->rank == 'A' ? 'checked="checked"' : ''; ?> />A
		<input type="radio" id="Lp_rank" name="Lp[rank]" value="B" <?php echo $model->rank == 'B' ? 'checked="checked"' : ''; ?> />B
		<input type="radio" id="Lp_rank" name="Lp[rank]" value="C" <?php echo $model->rank == 'C' ? 'checked="checked"' : ''; ?> />C
		<input type="radio" id="Lp_rank" name="Lp[rank]" value="D" <?php echo $model->rank == 'D' ? 'checked="checked"' : ''; ?> />D
		<input type="radio" id="Lp_rank" name="Lp[rank]" value="E" <?php echo $model->rank == 'E' ? 'checked="checked"' : ''; ?> />E
		
		<?php echo $form->error($model,'rank'); ?>
		</div>
		
		
		
		<div class="row">
		<?php echo $form->labelEx($model,'assets under management'); ?>
		<?php echo $form->textField($model, 'assets_umgmt'); ?>
		<?php echo $form->error($model,'assets_umgmt'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'assets under management original currency'); ?>
		<?php echo $form->textField($model, 'assets_umgmt_ori', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'assets_umgmt_ori'); ?>
		</div><!-- row -->
		
		
		<div style="float:left; position:relative; width: 170px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpcontinents", CHtml::listData($model->lpcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 170px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpregions", CHtml::listData($model->lpregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 170px;">
			<label>Sections</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpsectors", CHtml::listData($model->lpsectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 170px;">
			<label>Targets</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lptargets", CHtml::listData($model->lptargets,'target_id','target_id'), CHtml::listData(Target::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
        
        <div style="display: block; margin-top: 0px; margin-left:20px;  float:left;">
			<label>Segments</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpsegments", CHtml::listData($model->lpsegments,'segment_id','segment_id'), CHtml::listData(Segment::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
        <div class="clearfix"></div>
		
		<hr />
		<div class="row"><h3>Top 5 Interests</h3></div>
		
		<div style="float:left; position:relative; width: 200px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php
			$c_tops = array();
			for ($i=0;$i<count($model->lpcontinents);$i++){ if($model->lpcontinents[$i]->top == 1){	array_push($c_tops, $model->lpcontinents[$i]); } }
			echo CHtml::checkBoxList("lpcontinents2", CHtml::listData($c_tops,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php
			$r_tops = array();
			for ($i=0;$i<count($model->lpregions);$i++){ if($model->lpregions[$i]->top == 1){	array_push($r_tops, $model->lpregions[$i]); } }
			echo CHtml::checkBoxList("lpregions2", CHtml::listData($r_tops,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 200px;">
			<label>Sections</label>
			<div id="divcontainers">
			<?php
			$s_tops = array();
			for ($i=0;$i<count($model->lpsectors);$i++){ if($model->lpsectors[$i]->top == 1){	array_push($s_tops, $model->lpsectors[$i]); } }
			echo CHtml::checkBoxList("lpsectors2", CHtml::listData($s_tops,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'top_interests'); ?>
		<?php echo $form->checkBox($model, 'top_interests'); ?>
		<?php echo $form->error($model,'top_interests'); ?>
		</div><!-- row -->
		<hr />
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
