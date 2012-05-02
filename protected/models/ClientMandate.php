<?php

Yii::import('application.models._base.BaseClientMandate');

class ClientMandate extends BaseClientMandate
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getGps() {
        $gps = Gp::model()->findAll();
        $list =  array();
        foreach ($gps as $gp) {
            $list[$gp->id] = $gp->firm->name;
        }
        natcasesort($list);
        return $list;
    }
}
