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
	
        <?php echo $form->hiddenField($model, 'firm_id', array('value' => $model->firm_id) ); ?>
		
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

		<script type="text/javascript">
            function continentClick(c){
                $('input[name=gpregions\\[\\]]').each(function(i,e) {
                   if ($(e).attr('data') == $(c).val()) {
                      $(e).attr('checked', c.checked);
                   }
                }
                );
            }
		</script>

		<div style="float:left; margin-left:20px;">
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("gpcontinents", CHtml::listData($model->gpcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'onclick' => 'continentClick(this)')); ?>
			</div>
		</div>
		
		<div style="float:left; margin-left:20px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php
                $gpr = CHtml::listData($model->gpregions,'region_id','region_id');
                foreach(Region::model()->findAll() as $r) {
                    echo '<span>';
                    echo CHtml::checkBox("gpregions[]", in_array($r->id, $gpr), array('value' => $r->id, 'data' => $r->continent_id));
                    echo CHtml::label($r->name, false);
                    echo '</span>';
                }
            ?>
			</div>
		</div>
		
		<div style="float:left; margin-left:20px;">
			<label>Sections</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("gpsectors", CHtml::listData($model->gpsectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div class="clearfix"></div>

		
		<br />

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
