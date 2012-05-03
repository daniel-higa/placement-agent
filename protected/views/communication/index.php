<?php

$this->breadcrumbs = array(
	Communication::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Communication::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Communication::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Communication::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 