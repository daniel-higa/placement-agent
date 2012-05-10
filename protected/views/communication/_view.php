<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('date')); ?>:
	<?php echo GxHtml::encode($data->date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firm_id')); ?>:
	<?php echo GxHtml::encode($data->firm_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gp_id')); ?>:
	<?php echo GxHtml::encode($data->gp_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lp_id')); ?>:
	<?php echo GxHtml::encode($data->lp_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
	<?php echo GxHtml::encode($data->status_id); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('client_mandate_id')); ?>:
	<?php echo GxHtml::encode($data->client_mandate_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
	<?php echo GxHtml::encode($data->user_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employees_id')); ?>:
	<?php echo GxHtml::encode($data->employees_id); ?>
	<br />
	*/ ?>

</div>
