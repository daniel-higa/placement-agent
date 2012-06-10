<?php

Yii::import('application.models._base.BaseFundsize');

class Fundsize extends BaseFundsize
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getFundSizeItems() {
        return CHtml::listData(Fundsize::model()->findAll(), 'id', 'name');
    }
}
