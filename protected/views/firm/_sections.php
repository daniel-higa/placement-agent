<ul>
    <li class="left append-1">
        <a href='<?php echo $this->createUrl('/firm/view', array('id' => $model->id)) ?>'>Profile</a>
    </li>
    <li class="left append-1">
        <a href='<?php echo $this->createUrl('/firm/communications', array('id' => $model->id)) ?>'>Communications</a>
    </li>
    <li class="left append-1">
        <a href='<?php echo $this->createUrl('/firm/projects', array('id' => $model->id)) ?>'>Project</a>
    </li>
    <li class="left append-1">
        <a href='<?php echo $this->createUrl('/firm/funds', array('id' => $model->id)) ?>'>Funds</a>
    </li>
</ul>
