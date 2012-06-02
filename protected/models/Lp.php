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
    
    public function getEmployees() {
        $employees = array();
        foreach ($this->firm->offices as $o) {
            foreach($o->employees as $e) {
                $employees[] = $e;
            }
        }
        return $employees;
    }
    
    public function getFundSizeItems() {
        return array(
            '1' => '0-100',
            '2' => '100-250',
            '3' => '250-500',
            '4' => '500-1 billion',
            '5' => '1 billion and more',
        );
    }
    
    public function getAppetiteItems() {
        return array(
            '1' => '100% existing relationships',
            '2' => '85 % existing relationships',
            '3' => '50% existing relationships',
            '4' => '25% existing relationships',
            '5' => '100% new relationships',
        );
    }
    
    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');
        else
            $this->modified = new CDbExpression('NOW()');
     
        return parent::beforeSave();
    }
    
}
