<?php

Yii::import('application.models._base.BaseTarget');

class Target extends BaseTarget
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}