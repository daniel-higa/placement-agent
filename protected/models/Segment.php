<?php

Yii::import('application.models._base.BaseSegment');

class Segment extends BaseSegment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}