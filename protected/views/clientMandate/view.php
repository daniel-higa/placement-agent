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
'description',
'gp_id',
	),
)); ?>

<div>
    <a href=<?php echo $this->createUrl("clientMandate/addLps", array('id' => $model->id)); ?> ><button>Add LPs</button></a>

    <h2>LP list</h2>
    <div>
        <table>
        <thead>
            <tr>
                <th>LP id</th>
                <th>Firm Name</th>
                <th>Status id</th>
                <th>Status</th>
            </tr>
        </thead>

        <?php
            //echo count($model->client_mandate_lps) . "<br/>";
            foreach ($model->client_mandate_lps as $cmlp) {
                echo '<tr>';
                echo '<td>' . $cmlp->lp_id . '</td>';
                echo '<td>' . $cmlp->lp->firm->name . '</td>';
                echo '<td>' . $cmlp->status_id . '</td>';
                echo '<td>' . ($cmlp->status_id?$cmlp->status->name:'') . '</td>';
                echo '</tr>';
              }
        ?>
        </table>
    </div>
</div>
