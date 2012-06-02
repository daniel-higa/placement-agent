<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
        'id',
        'date',
        'description',
        'firm_id',
        'gp_id',
        'lp_id',
        'status_id',
        'client_mandate_id',
        array('label' => 'user',
            'type' => 'raw',
            'value' =>  $model->todo_user->name
        ),
        array('label' => 'Employee',
            'type' => 'raw',
            'value' =>  $model->getEmployeeName(),
        ),
	),
)); ?>

<h1>To Do</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
        'todo_description',
        'todo_date',
        array('label' => 'user',
            'type' => 'raw',
            'value' =>  $model->todo_user->name
        ),
        array('label' => 'Done',
            'type' => 'raw',
            'value' =>  $model->todo_done?'Yes':'No'
        ),
    ),
)); ?>


<h2><?php echo GxHtml::encode($model->getRelationLabel('tags')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->tags as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('tag/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
