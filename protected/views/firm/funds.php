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

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->firmtype->name) . ': ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<?php echo '<p> created:' . $model->created . ' - Modified:' . $model->modified . '</p>'; ?>
<?php $this->renderPartial('_sections', array('model' => $model)); ?>
<?php $this->renderPartial('_sumary', array('model' => $model)); ?>

<h2>Funds</h2>


Section not created yet
