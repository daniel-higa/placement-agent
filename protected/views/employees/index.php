<?php

$this->breadcrumbs = array(
	Employees::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Employees::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Employees::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Employees::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 