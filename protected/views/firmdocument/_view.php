<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('firm_id')); ?>:
	<?php echo GxHtml::encode($data->firm_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('file')); ?>:
	<?php echo GxHtml::encode($data->file); ?>
	<br />

</div>