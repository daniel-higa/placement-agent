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
'first_name',
'last_name',
'email',
'phone_office',
'phone_office_ext',
'phone_home',
'phone_mobile',
'fax',
'position',
'current_position:boolean',
'archived_position:boolean',
'skype',
'personal_note',
array(
			'name' => 'office',
			'type' => 'raw',
			'value' => $model->office !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->office)), array('office/view', 'id' => GxActiveRecord::extractPkValue($model->office, true))) : null,
			),
	),
)); ?>

<h2>Continents<!--<?php echo GxHtml::encode($model->getRelationLabel('employeescontinents')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->employeescontinents as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Continent::model()->findByPk($relatedModel->continent_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Regions<!--<?php echo GxHtml::encode($model->getRelationLabel('employeesregions')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->employeesregions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Region::model()->findByPk($relatedModel->region_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Sectors<!--<?php echo GxHtml::encode($model->getRelationLabel('employeessectors')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->employeessectors as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Sector::model()->findByPk($relatedModel->sector_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
