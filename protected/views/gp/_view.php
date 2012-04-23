<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firm_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->firm)); ?>
	<br />

</div>