<?php

Yii::import('application.models._base.BaseEmployees');

class Employees extends BaseEmployees
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}