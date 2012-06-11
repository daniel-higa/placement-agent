<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'firmdocument-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		'id',
		'file',
		array(
			'class' => 'CButtonColumn',
            'template' => '{delete}',
		),
	),
)); ?>
