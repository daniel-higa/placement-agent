<?php
    if ($model->firmtype_id == 1) {
        $this->renderPartial('/gp/_sumary', array('firm' => $model, 'model' => $model->gp));
    } elseif ($model->firmtype_id == 2) {
        $this->renderPartial('/lp/_sumary', array('firm' => $model, 'model' => $model->lp));
    } else {
        $this->renderPartial('_sumary_others', array('model' => $model));
    }
