Choose type of firm:<br/>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl('/firm/create', array('type' => 1)) ?>">Add GP</a>
</div>

<div class="row">
    <a href="<?php echo Yii::app()->createUrl('/firm/create', array('type' => 2)) ?>">Add LP</a>
</div>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl('/firm/create', array('type' => 3)) ?>">Add Other Firm</a>
</div>
