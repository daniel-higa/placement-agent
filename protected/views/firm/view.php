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
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? User::model()->findByPk($model->user_id)->name : null,
			),
array(
			'name' => 'firmtype',
			'type' => 'raw',
			'value' => $model->firmtype !== null ? Firmtype::model()->findByPk($model->firmtype_id)->name : null,
			),
'description',
'website',
'rank',
	),
)); ?>

<h2>Continents<!--<?php echo GxHtml::encode($model->getRelationLabel('firmcontinents')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->firmcontinents as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Continent::model()->findByPk($relatedModel->continent_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Regions<!--<?php echo GxHtml::encode($model->getRelationLabel('firmregions')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->firmregions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Region::model()->findByPk($relatedModel->region_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Documents<!--<?php echo GxHtml::encode($model->getRelationLabel('firmdocuments')); ?>--></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->firmdocuments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::valueEx($relatedModel), 'upload/'.GxHtml::valueEx($relatedModel), array('target'=>'_blank'));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>