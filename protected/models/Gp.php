<?php

Yii::import('application.models._base.BaseGp');

class Gp extends BaseGp
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getName() {
        if (isset($this->firm_id)) {
            return $this->firm->name;
        }
        return 'N/A';
    }
}
