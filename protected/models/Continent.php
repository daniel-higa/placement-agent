<?php

Yii::import('application.models._base.BaseContinent');

class Continent extends BaseContinent
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}