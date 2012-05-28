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
'name',
array(
			'name' => 'country',
			'type' => 'raw',
			'value' => $model->country !== null ? GxHtml::encode(GxHtml::valueEx($model->country)) : null,
			),
'main_office:boolean',
'phone',
'address',
'city',
'state',
'description',
'sync_gmaps:boolean',
array(
			'name' => 'firm',
			'type' => 'raw',
			'value' => $model->firm !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->firm)), array('firm/view', 'id' => GxActiveRecord::extractPkValue($model->firm, true))) : null,
			),
	),
)); ?>
<!--
<h2>Continents</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->officecontinents as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Continent::model()->findByPk($relatedModel->continent_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Regions</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->officeregions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Region::model()->findByPk($relatedModel->region_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
-->

