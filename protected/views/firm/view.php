<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create GP'), 'url'=>array('create', 'type' => 1)),
    array('label'=>Yii::t('app', 'Create LP'), 'url'=>array('create', 'type' => 2)),
    array('label'=>Yii::t('app', 'Create Other') . ' ' . $model->label(), 'url'=>array('create', 'type' => 3)),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>
<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->firmtype->name) . ': ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<?php echo '<p> created:' . $model->created . ' - Modified:' . $model->modified . '</p>'; ?>
<?php $this->renderPartial('_sections', array('model' => $model)); ?>
<?php $this->renderPartial('_sumary', array('model' => $model)); ?>


<h2>Description</h2>
<div class="description">
    <?php echo $model->description?>
</div>

<div class="row">
    website: 
    <?php 
        $website = $model->website;
        echo "<a href='$model->website'>$model->website</a>";
    ?>
</div>
<?php echo '<a href="' . Yii::app()->createUrl('/firm/update', array('id' => $model->id)) . '"><button>Edit</button></a>'; ?>

<h2>Documents</h2><a href="<?php echo Yii::app()->createUrl('/firmdocument/create', array('firm_id' => $model->id)); ?>"><button>add document</button></a>

<?php
    $fd = new Firmdocument('search');
    $fd->unsetAttributes();
    $fd->firm_id = $model->id;

    $this->renderPartial('admin_documents', array(
            'model' => $fd,
            'buttons' => 'create'));
?>


<?php $this->renderPartial('_officesEmployees', array('model' => $model)); ?>
