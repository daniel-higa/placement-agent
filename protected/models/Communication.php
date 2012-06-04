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
    
    public function getUserName() {
       if (isset($this->user)) {
         return $this->user->name;
       }
       return 'N/A';
    }
    
    public function getTodoUserName() {
       if (isset($this->todo_user)) {
         return $this->todo_user->name;
       }
       return 'N/A';
    }
    
    public function getGpName() {
        if (isset($this->gp_id)) {
            return $this->gp->getName();
        }
        return 'N/A';
    }
    
    public function getLpName() {
        if (isset($this->lp_id)) {
            return $this->lp->getName();
        }
        return 'N/A';
    }
    
    public function getFirmName() {
        if ($this->firm_id) {
            return $this->firm->name;
        }
        return 'N/A';
    }
    
    public function search2($firm_id) {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('firm_id', $firm_id, false);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('client_mandate_id', $this->client_mandate_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('employees_id', $this->employees_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
