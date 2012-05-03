<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gp_id')); ?>:
	<?php echo GxHtml::encode($data->gp_id); ?>
	<br />
    <?php echo GxHtml::encode('Firm Name'); ?>:
	<?php echo GxHtml::encode($data->gp->firm->name); ?>
	<br />

</div>
