<?php
    echo '<p> created:' . $model->created . ' - Modified:' . $model->modified . '</p>';
    if ($model->firmtype_id == 1) {
        $this->renderPartial('/gp/_sumary', array('model' => $model));
    } elseif ($model->firmtype_id == 2) {
        $this->renderPartial('/lp/_sumary', array('model' => $model));
    } else {
        $this->renderPartial('_sumary_others', array('model' => $model));
    }
