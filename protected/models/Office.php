<?php

Yii::import('application.models._base.BaseOffice');

class Office extends BaseOffice
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getName() {
        return $this->city . ' - ' . ($this->country?$this->country->name:'N/A');
    }
}
