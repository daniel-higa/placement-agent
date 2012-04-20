<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('website')); ?>:
	<?php echo GxHtml::encode($data->website); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rank')); ?>:
	<?php echo GxHtml::encode($data->rank); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firm_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->firm)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('assets under management')); ?>:
	<?php echo GxHtml::encode($data->assets_umgmt); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('assets under management original currency')); ?>:
	<?php echo GxHtml::encode($data->assets_umgmt_ori); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('top_interests')); ?>:
	<?php echo GxHtml::encode($data->top_interests); ?>
	<br />

</div>