<?php

class OfficeController extends GxController {

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Office'),
		));
	}

	public function actionCreate() {
		$model = new Office;


		if (isset($_POST['Office'])) {
			$model->setAttributes($_POST['Office']);

			if ($model->save()) {
			
				if(isset($_POST['officeregions']))
                {
					$model_regions=$_POST['officeregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Officeregion;
						$model_r->office_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				if(isset($_POST['officecontinents']))
                {
					$model_continents=$_POST['officecontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Officecontinent;
						$model_c->office_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Office');


		if (isset($_POST['Office'])) {
			$model->setAttributes($_POST['Office']);
			
			Officeregion::model()->deleteAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $model->id)));
			if(isset($_POST['officeregions']))
			{
				$model_regions=$_POST['officeregions'];
				for ($i=0;$i<count($model_regions);$i++){
					$model_r=new Officeregion;
					$model_r->office_id = $model->id;
					$model_r->region_id = $model_regions[$i];
					$model_r->save();
				}
			}
			
			Officecontinent::model()->deleteAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $model->id)));
			if(isset($_POST['officecontinents']))
			{
				$model_continents=$_POST['officecontinents'];
				for ($i=0;$i<count($model_continents);$i++){
					$model_c=new Officecontinent;
					$model_c->office_id = $model->id;
					$model_c->continent_id = $model_continents[$i];
					$model_c->save();
				}
			}

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
		
			Officeregion::model()->deleteAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $id)));
			Officecontinent::model()->deleteAll(array('condition' => 'office_id = :ID', 'params' => array(':ID' => $id)));
			$this->loadModel($id, 'Office')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Office');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Office('search');
		$model->unsetAttributes();

		if (isset($_GET['Office']))
			$model->setAttributes($_GET['Office']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}