<?php

Yii::import('application.models._base.BaseStatus');

class Status extends BaseStatus
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}