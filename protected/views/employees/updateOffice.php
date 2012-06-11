$('#Employees_office_id').html("<?php echo addslashes($office); ?>");
$('#create_office').html("<a href=<?php echo Yii::app()->createUrl('/office/create', array('firm_id' => $post['firm_id'])) ?> >Add Office</a>");
