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
    
    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');
        else
            $this->modified = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
    
    public function updateModified() {
        $this->modified = new CDbExpression('NOW()');
        $this->save();
    }
}
