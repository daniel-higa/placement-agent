<?php

Yii::import('application.models._base.BaseTodo');

class Todo extends BaseTodo
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}