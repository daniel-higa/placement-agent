<?php

Yii::import('application.models._base.BaseLp');

class Lp extends BaseLp
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public static function getRankItems() {
        return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E');
    }
    
}
