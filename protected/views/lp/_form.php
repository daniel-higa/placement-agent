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
	
        <div class="row">
		<?php echo $form->labelEx($model,'lptype_id'); ?>
		<?php echo $form->dropDownList($model, 'lptype_id', GxHtml::listDataEx(Lptype::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'lptype_id'); ?>
		</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		<?php echo CHtml::radioButtonList('Lp[rank]', $model->rank, Firm::getRankItems(), array( 'separator' => '&nbsp;', 'labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'rank'); ?>
		</div>

		<div class="row">
		<?php echo $form->labelEx($model,'assets_umgmt'); ?>
		<?php echo $form->textField($model, 'assets_umgmt'); ?>
		<?php echo $form->error($model,'assets_umgmt'); ?>
		</div><!-- row -->
        

        <div class="row">
        <?php echo $form->labelEx($model,'pe_allocation'); ?>
        <?php echo $form->textField($model, 'pe_allocation'); ?>
        <?php echo $form->error($model,'pe_allocation'); ?>
        </div>

        <div class="row">
        <?php echo $form->labelEx($model,'commited_pe'); ?>
        <?php echo $form->textField($model, 'commited_pe'); ?>
        <?php echo $form->error($model,'commited_pe'); ?>
        </div>

        <?php echo $form->labelEx($model,'average_inv'); ?>
		<?php echo $form->textField($model, 'average_inv', array('maxlength' => 2)); ?>
		<?php echo $form->error($model,'average_inv'); ?>

		 <?php echo $form->hiddenField($model, 'firm_id', array('value' => $model->firm_id) ); ?>
		       
        <?php echo $form->labelEx($model,'average_ticket'); ?>
		<?php echo $form->textField($model, 'average_ticket', array('maxlength' => 2)); ?>
		<?php echo $form->error($model,'average_ticket'); ?>
		
        <!--original currency-->
		<?php echo $form->hiddenField($model, 'assets_umgmt_ori', array('maxlength' => 100, 'value' =>'1')); ?>
		<!-- row -->
        
        <div class="row">
		<?php echo $form->labelEx($model,'fund_size'); ?>
		<?php echo $form->checkBoxList($model, 'fundsizes', Fundsize::model()->getFundSizeItems(), array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'fund_size'); ?>
		</div>
        
        
        <script type="text/javascript">
            function toggle_appetite(s) {
                if (s.val() == 1) {
                    $('#div_appetite').show('fast');
                } else {
                    $('#div_appetite').hide('fast');
                }
            }
        </script>
        <div class="row">
        <?php echo $form->labelEx($model,'actively'); ?>
        <?php echo $form->radioButtonList($model, 'actively', array(true => 'Yes', false => 'No'), array('onclick' => 'toggle_appetite($(this));', 'template' => '<span class="left">{input}</span><span class="left">{label}</span>', 'class' => 'left', 'separator' => ' ')); ?>
        <?php echo $form->error($model,'actively'); ?>
        </div>
        <div class="clearfix"></div>
        
        <?php
            if (isset($model->actively) and $model->actively == true) {
                echo '<div id="div_appetite" class="row">';
            } else {
                echo '<div id="div_appetite" class="row" style="display: none;">';
            }
        ?>
		<?php echo $form->labelEx($model,'appetite'); ?>
		<?php echo $form->dropDownList($model, 'appetite', Lp::model()->getAppetiteItems(), array('empty' => 'Choose One')); ?>
		<?php echo $form->error($model,'appetite'); ?>
		</div>
        
        <hr/>
        
        <h2>General investment strategy</h2>
		
		<script type="text/javascript">
            var count = 5 - <?php echo $model->countTops(); ?>;
            
            function continentClick(c){
                $('input[name=lpregions\\[\\]]').each(function(i,e) {
                   if ($(e).attr('data') == $(c).val()) {
                      $(e).attr('checked', c.checked);
                   }
                }
                );
            }
            
            function interestClick(i) {
                if ($(i).attr('checked')) {
                    if (count > 0) {
                        count--;
                    } else {
                        $(i).attr('checked', false);
                    }
                } else {
                    count++;
                }
                $('#count').html(count);
            }
            
            
		</script>
		<div style="float:left; position:relative; width: 120px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpcontinents", CHtml::listData($model->lpcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick' => 'continentClick(this)')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 120px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php //echo
                //CHtml::checkBoxList("lpregions", CHtml::listData($model->lpregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label} </span>'));
                $lpr = CHtml::listData($model->lpregions,'region_id','region_id');
                foreach(Region::model()->findAll() as $r) {
                    echo '<span>';
                    echo CHtml::checkBox("lpregions[]", in_array($r->id, $lpr), array('value' => $r->id, 'data' => $r->continent_id));
                    echo CHtml::label($r->name, false);
                    echo '</span>';
                }
            ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 120px;">
			<label>Sectors</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpsectors", CHtml::listData($model->lpsectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 120px;">
			<label>Targets</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lptargets", CHtml::listData($model->lptargets,'target_id','target_id'), CHtml::listData(Target::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
        
        <div style="float:left; position:relative; width: 120px;">
			<label>Segments</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("lpsegments", CHtml::listData($model->lpsegments,'segment_id','segment_id'), CHtml::listData(Segment::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>

		
		<hr />
		<div class="row"><h3>Top Interests</h3></div>
		<div id ="count"></div>
		<div style="float:left; position:relative; width: 200px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php
			$c_tops = array();
			for ($i=0;$i<count($model->lpcontinents);$i++){ if($model->lpcontinents[$i]->top == 1){	array_push($c_tops, $model->lpcontinents[$i]); } }
			echo CHtml::checkBoxList("lpcontinents2", CHtml::listData($c_tops,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick' => 'interestClick(this)')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php
			$r_tops = array();
			for ($i=0;$i<count($model->lpregions);$i++){ if($model->lpregions[$i]->top == 1){	array_push($r_tops, $model->lpregions[$i]); } }
			echo CHtml::checkBoxList("lpregions2", CHtml::listData($r_tops,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick' => 'interestClick(this)')); ?>
			</div>
		</div>
		
		<div style="float:left; position:relative; width: 200px;">
			<label>Sectors</label>
			<div id="divcontainers">
			<?php
			$s_tops = array();
			for ($i=0;$i<count($model->lpsectors);$i++){ if($model->lpsectors[$i]->top == 1){	array_push($s_tops, $model->lpsectors[$i]); } }
			echo CHtml::checkBoxList("lpsectors2", CHtml::listData($s_tops,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick' => 'interestClick(this)')); ?>
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
