<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create GP'), 'url'=>array('create', 'type' => 1)),
        array('label'=>Yii::t('app', 'Create LP'), 'url'=>array('create', 'type' => 2)),
        array('label'=>Yii::t('app', 'Create Other') . ' ' . $model->label(), 'url'=>array('create', 'type' => 3)),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('firm-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'firm-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		'id',
		array(
            'type' => 'raw',
            'value' => 'FirmHelper::viewUrl($data)',
            'name' => 'name'
        ),
		array(
				'name'=>'user_id',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'firmtype_id',
				'value'=>'GxHtml::valueEx($data->firmtype)',
				'filter'=>GxHtml::listDataEx(Firmtype::model()->findAllAttributes(null, true)),
				),/*
		'description',*/
		'website',
		/*
		'rank',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>
