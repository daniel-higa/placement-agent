<?php

/**
 * This is the model base class for the table "employeesfundsize".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Employeesfundsize".
 *
 * Columns in table "employeesfundsize" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $employees_id
 * @property integer $fundsize_id
 *
 */
abstract class BaseEmployeesfundsize extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'employeesfundsize';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Employeesfundsize|Employeesfundsizes', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('employees_id, fundsize_id', 'numerical', 'integerOnly'=>true),
			array('employees_id, fundsize_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, employees_id, fundsize_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
            'employee' => array(self::BELONGS_TO, 'Employees', 'employees_id'),
            'fundsize' => array(self::BELONGS_TO, 'Fundsize', 'fundsize_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'employees_id' => Yii::t('app', 'Employees'),
			'fundsize_id' => Yii::t('app', 'Fundsize'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('employees_id', $this->employees_id);
		$criteria->compare('fundsize_id', $this->fundsize_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}