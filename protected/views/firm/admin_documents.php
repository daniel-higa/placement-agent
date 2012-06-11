<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'firmdocument-grid',
	'dataProvider' => $model->search(),
    'ajaxUrl' => Yii::app()->createUrl('/firmdocument/admin', array('firm_id' => $model->firm_id)),
	'columns' => array(
		'id',
		array(
            'name' => 'file',
            'type' => 'raw',
            'value' => 'CHtml::link($data["file"], $data->getFileUrl())',
        ),
		array(
			'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/firmdocument/delete", array("id" =>  $data["id"]))',
		),
	),
)); ?>
