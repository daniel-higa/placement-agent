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
'rank',
'assets_umgmt',
'assets_umgmt_ori',/*
'top_interests:boolean',*/
array(
			'name' => 'firm',
			'type' => 'raw',
			'value' => $model->firm !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->firm)), array('firm/update', 'id' => GxActiveRecord::extractPkValue($model->firm, true))) : null,
			),

array(
			'name' => 'description',
			'type' => 'raw',
			'value' => $model->firm !== null ? Firm::model()->findByPk($model->firm_id)->description : null,
			),
array(
			'name' => 'website',
			'type' => 'raw',
			'value' => $model->firm !== null ? Firm::model()->findByPk($model->firm_id)->website : null,
			),
),
)); ?>

<br /><br />
	
	<h2>Offices/Employees</h2>
<?php
	echo GxHtml::openTag('ul');
	
	$offices = Office::model()->findAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $model->firm_id)));
	
	foreach($offices as $office) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode($office->name), array('office/update', 'id' => $office->id)) . ": ";
		
		echo GxHtml::openTag('ul');
		
		$emps = Employees::model()->findAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $office->id)));
		foreach($emps as $emp) {
			echo GxHtml::openTag('li');
			echo GxHtml::link(GxHtml::encode($emp->first_name.' '.$emp->last_name), array('employees/update', 'id' => $emp->id));
			echo GxHtml::closeTag('li');
		}
		
		echo GxHtml::closeTag('ul');
		
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>

<br /><br />

<h2>Continents</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->lpcontinents as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Continent::model()->findByPk($relatedModel->continent_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Regions</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->lpregions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Region::model()->findByPk($relatedModel->region_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Sectors</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->lpsectors as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Sector::model()->findByPk($relatedModel->sector_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Targets</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->lptargets as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::encode(Target::model()->findByPk($relatedModel->target_id)->name);
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Documents</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->lpdocuments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::valueEx($relatedModel), 'upload/'.GxHtml::valueEx($relatedModel), array('target'=>'_blank'));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>