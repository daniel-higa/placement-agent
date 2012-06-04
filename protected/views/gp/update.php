<?php

$this->breadcrumbs = array(
	'Firm' => array('/firm/index'),
	Yii::t('app', 'Update'),
);

$this->menu = array(
	array('label' => 'Cancel', 'url'=>array('/firm/admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>
