<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create GP'), 'url'=>array('create', 'type' => 1)),
    array('label'=>Yii::t('app', 'Create LP'), 'url'=>array('create', 'type' => 2)),
    array('label'=>Yii::t('app', 'Create Other') . ' ' . $model->label(), 'url'=>array('create', 'type' => 3)),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_sumary', array('model' => $model)); ?>
<?php $this->renderPartial('_sections', array('model' => $model)); ?>

<h2>Description</h2>
<div class="description">
    <?php echo $model->description?>
</div>

<div class="row">
    website: 
    <?php 
        $website = $model->website;
        echo "<a href='$model->website'>$model->website</a>";
    ?>
</div>

<h2>Documents<!--<?php echo GxHtml::encode($model->getRelationLabel('firmdocuments')); ?>--></h2>

<?php
	echo GxHtml::openTag('ul');
	foreach($model->firmdocuments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::valueEx($relatedModel), 'upload/'.GxHtml::valueEx($relatedModel), array('target'=>'_blank'));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>


<?php $this->renderPartial('_officesEmployees', array('model' => $model)); ?>
