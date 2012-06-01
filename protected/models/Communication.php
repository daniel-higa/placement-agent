<?php

Yii::import('application.models._base.BaseCommunication');

class Communication extends BaseCommunication
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getLpItems() {
        $items = array();
        if ($this->client_mandate_id) {
            foreach ($this->client_mandate->lps as $lp) {
                $items[$lp->id] = $lp->firm->name;
            }
        }
        return $items;
    }
    
    
    public function getEmployeeItems() {
        $items = array();
        if ($this->lp_id) {
            foreach ($this->lp->employees as $e) {
                $items[$e->id] = $e->fullname();
            }
        }
        return $items;
    }
    
    public function getEmployeeName() {
       if (isset($this->employee)) {
         return $this->employee->last_name . ', ' . $this->employee->first_name;
       }
       return 'N/A';
    }
    
}
