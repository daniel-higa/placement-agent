<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rank')); ?>:
	<?php echo GxHtml::encode($data->rank); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('assets under management')); ?>:
	<?php echo GxHtml::encode($data->assets_umgmt); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('assets under management original currency')); ?>:
	<?php echo GxHtml::encode($data->assets_umgmt_ori); ?>
	
	<br />
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firm_id')); ?>:
		<?php echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($data->firm)), array('firm/update', 'id' => $data->firm_id)); ?>
	
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode(Firm::model()->findByPk($data->firm_id)->description); ?>
	
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('website')); ?>:
	<?php echo GxHtml::encode(Firm::model()->findByPk($data->firm_id)->website); ?>
	
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('responsible')); ?>:
	<?php $firm = Firm::model()->findByPk($data->firm_id); echo GxHtml::encode(User::model()->findByPk($firm->user_id)->name); ?>
	
	
	
	<br /><br />
	
	<h2>Offices/Employees</h2>
<?php
	echo GxHtml::openTag('ul');
	
	$offices = Office::model()->findAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $data->firm_id)));
	
	foreach($offices as $office) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode($office->name), array('office/update', 'id' => $office->id)) . ": ";
		
		echo GxHtml::openTag('ul');
		
		$emps = Employees::model()->findAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $office->id)));
		foreach($emps as $emp) {
			echo GxHtml::openTag('li');
			echo GxHtml::link(GxHtml::encode($emp->first_name.' '.$emp->last_name), array('employees/update', 'id' => $emp->id));
			echo GxHtml::closeTag('li');
		}
		
		echo GxHtml::closeTag('ul');
		
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
	
	

</div>