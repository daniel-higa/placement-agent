<?php

$this->breadcrumbs = array(
	Firmdocument::label(2),
	'Index',
);

$this->menu = array(
	array('label'=>'Create' . ' ' . Firmdocument::label(), 'url' => array('create')),
	array('label'=>'Manage' . ' ' . Firmdocument::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Firmdocument::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 