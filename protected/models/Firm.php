<?php

Yii::import('application.models._base.BaseFirm');

class Firm extends BaseFirm
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public static function getRankItems() {
        return array(
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E'
        );
    }
    
    public function responsible() {
        if (isset($this->user_id)) {
            return $this->user->name;
        }
        return 'N/A';
    }
}
