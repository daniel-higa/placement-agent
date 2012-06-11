<?php

Yii::import('application.models._base.BaseFirmdocument');

class Firmdocument extends BaseFirmdocument
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getFileUrl() {
        return 'file.php?id=' . $this->id . '&filename=' . urlencode($this->file);
    }
}
