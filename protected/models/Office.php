<?php

Yii::import('application.models._base.BaseOffice');

class Office extends BaseOffice
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}