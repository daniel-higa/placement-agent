<?php

Yii::import('application.models._base.BaseCommunication');

class Communication extends BaseCommunication
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}