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
    
}
