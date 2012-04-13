<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('first_name')); ?>:
	<?php echo GxHtml::encode($data->first_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_name')); ?>:
	<?php echo GxHtml::encode($data->last_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_office')); ?>:
	<?php echo GxHtml::encode($data->phone_office); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_office_ext')); ?>:
	<?php echo GxHtml::encode($data->phone_office_ext); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_home')); ?>:
	<?php echo GxHtml::encode($data->phone_home); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_mobile')); ?>:
	<?php echo GxHtml::encode($data->phone_mobile); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fax')); ?>:
	<?php echo GxHtml::encode($data->fax); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('current_position')); ?>:
	<?php echo GxHtml::encode($data->current_position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('archived_position')); ?>:
	<?php echo GxHtml::encode($data->archived_position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('skype')); ?>:
	<?php echo GxHtml::encode($data->skype); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('personal_note')); ?>:
	<?php echo GxHtml::encode($data->personal_note); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('office_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->office)); ?>
	<br />
	*/ ?>

</div>