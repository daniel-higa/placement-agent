<?php

/**
 * This is the model base class for the table "lpsector".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Lpsector".
 *
 * Columns in table "lpsector" available as properties of the model,
 * followed by relations of table "lpsector" available as properties of the model.
 *
 * @property string $id
 * @property string $lp_id
 * @property string $sector_id
 *
 * @property Lp $lp
 * @property Sector $sector
 */
abstract class BaseLpsector extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'lpsector';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Lpsector|Lpsectors', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('lp_id, sector_id', 'required'),
			array('lp_id, sector_id', 'length', 'max'=>10),
			array('id, lp_id, sector_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'lp' => array(self::BELONGS_TO, 'Lp', 'lp_id'),
			'sector' => array(self::BELONGS_TO, 'Sector', 'sector_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'lp_id' => null,
			'sector_id' => null,
			'lp' => null,
			'sector' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('lp_id', $this->lp_id);
		$criteria->compare('sector_id', $this->sector_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}