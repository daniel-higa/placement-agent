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
		<?php echo $form->labelEx($model,'date'); ?>
		<?php  $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date',
			'value' => $model->date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			)); ?>
		<?php echo $form->error($model,'date'); ?>
        </div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'communication_type_id'); ?>
		<?php echo $form->dropDownList($model, 'communication_type_id', GxHtml::listDataEx(CommunicationType::model()->findAllAttributes(null, true)),array('empty' => 'Choose one')); 
        ?>
		<?php echo $form->error($model,'communication_type_id'); ?>
		</div><!-- row -->
        
        <div class="row">
		<?php echo $form->labelEx($model,'client_mandate_id'); ?>
		<?php echo $form->dropDownList($model, 'client_mandate_id', GxHtml::listDataEx(ClientMandate::model()->findAllAttributes(null, true)),array('empty' => 'Choose one', 
                'ajax' => array(
                    'type' => 'post',
                    'url'=>CController::createUrl('communication/ajax_lp'),
                    'update'=>'#Communication_lp_id',
                ),
            )); 
        ?>
		<?php echo $form->error($model,'client_mandate_id'); ?>
		</div><!-- row -->
        
        <div class="row">
		<?php echo $form->labelEx($model,'lp_id'); ?>
		<?php
                echo $form->dropDownList($model, 'lp_id', $model->getLpItems(), array('empty' => 'Choose one' ,
                    'ajax' => array(
                        'type' => 'post',
                        'url'=>CController::createUrl('communication/ajax_employee'),
                        'update'=>'#Communication_employees_id',
                    ),
                ));
        ?>
		<?php echo $form->error($model,'lp_id'); ?>
		</div><!-- row -->
        
        <div class="row">
		<?php echo $form->labelEx($model,'employees_id'); ?>
        <?php
              $emp_list = Employees::model()->findAllAttributes(null, true);
        ?>
		<?php echo $form->dropDownList($model, 'employees_id', $model->getEmployeeItems(), array('empty' => 'Choose one',
            )); ?>
		<?php echo $form->error($model,'employees_id'); ?>
		</div><!-- row -->
        
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
        
		
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),array('empty' => 'Choose one' )); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		

        <hr/>
        
        <h2>To D2</h2>
        
        <div class="row">
		<?php echo $form->labelEx($model,'todo_description'); ?>
		<?php echo $form->textArea($model, 'todo_description'); ?>
		<?php echo $form->error($model,'todo_description'); ?>
		</div><!-- row -->
        
        <div class="row">
		<?php echo $form->labelEx($model,'todo_date'); ?>
		<?php  $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'todo_date',
			'value' => $model->date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			)); ?>
		<?php echo $form->error($model,'todo_date'); ?>
        </div>
        
        <hr/>
        <h2>Tags</h2>
        <label><?php echo GxHtml::encode($model->getRelationLabel('tags')); ?></label>
        <div id="divcontainers">
		<?php echo $form->checkBoxList($model, 'tags', GxHtml::encodeEx(GxHtml::listDataEx(Tag::model()->findAllAttributes(null, true)), false, true), array('separator'=>'<span class="left">,&nbsp;&nbsp;</span>', 'template' => ' <span class="left">{input}{label} </span> ')); ?>
        </div>
        <div class="clearfix"></div>
        <hr/>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
