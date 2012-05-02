<?php

/**
 * This is the model base class for the table "communication_tag".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CommunicationTag".
 *
 * Columns in table "communication_tag" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $tag_id
 * @property integer $communication_id
 *
 */
abstract class BaseCommunicationTag extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'communication_tag';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CommunicationTag|CommunicationTags', $n);
	}

	public static function representingColumn() {
		return 'tag_id';
	}

	public function rules() {
		return array(
			array('tag_id, communication_id', 'numerical', 'integerOnly'=>true),
			array('tag_id, communication_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('tag_id, communication_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'tag_id' => Yii::t('app', 'Tag'),
			'communication_id' => Yii::t('app', 'Communication'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('tag_id', $this->tag_id);
		$criteria->compare('communication_id', $this->communication_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}