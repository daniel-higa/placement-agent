<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_sumary', array('model' => $model)); ?>
<?php $this->renderPartial('_sections', array('model' => $model)); ?>

<h2>Projects</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'client-mandate-grid',
	'dataProvider' => $clientmandate->search2($model),
	'filter' => $clientmandate,
	'columns' => array(
		'id',
		array('name' => 'name', 'type' => 'raw', 'value' => 'CHTML::link($data->name, array("clientMandate/view", "id" => $data->id))'),
		'description',
		array(
            'name' => 'gp_id',
            'value' => 'FirmHelper::getGpName($data->gp_id)',
        ),
		array(
			'class' => 'CButtonColumn',
            'viewButtonUrl'=>'Yii::app()->createUrl("/clientMandate/view", array("id" => $data->id))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/clientMandate/update", array("id" => $data->id))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/clientMandate/delete", array("id" => $data->id))',
		),
	),
)); ?>
