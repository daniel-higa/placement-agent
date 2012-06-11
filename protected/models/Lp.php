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
    
    public function getName() {
        if (isset($this->firm_id)) {
            return $this->firm->name;
        }
        return 'N/A';
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
        $this->firm->updateModified();
        $this->firm->rank = $this->getAttribute('rank');
        $this->firm->save();
        return parent::beforeSave();
    }
    
    public function countTops() {
        $continents = $this->topContinents();
        $regions = $this->topRegions();
        $sectors = $this->topSectors();
        return count($continents) + count($regions) + count($sectors);
    }
    
    public function topContinents() {
        $top = array();
        foreach ($this->lpcontinents as $lpc) {
            if ($lpc->top) {
                $top[] = $lpc;
            }
        }
        return $top;
    }

    public function topRegions() {
        $top = array();
        foreach ($this->lpregions as $lpr) {
            if ($lpr->top) {
                $top[] = $lpr;
            }
        }
        return $top;
    }    

    public function topSectors() {
        $top = array();
        foreach ($this->lpsectors as $lps) {
            if ($lps->top) {
                $top[] = $lps;
            }
        }
        return $top;
    }
    
    public function actively() {
        return $this->actively?'Yes':'No';
    }
    
    public function appetite() {
        $appetite = $this->getAppetiteItems();
        return $this->appetite?$appetite[$this->appetite]:'N/A';
    }

}
