<?php

class FirmdocumentController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'admin', 'delete'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Firmdocument'),
		));
	}

	public function actionCreate() {
		$model = new Firmdocument;


		if (isset($_POST['Firmdocument'])) {
			$model->setAttributes($_POST['Firmdocument']);
            if (isset($_FILES['file']['name'][0])) {
                $model->file = $_FILES['file']['name'];
            }

			if ($model->save()) {
                if(!move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $model->primaryKey)){
                    $model->delete();
                }

				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('/firm/view', 'id' => $model->firm_id));
			}
		}
        if (isset($_GET['firm_id'])) {
            $model->firm_id = $_GET['firm_id'];
        }

		$this->render('create', array( 'model' => $model));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Firmdocument')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Firmdocument');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Firmdocument('search');
		$model->unsetAttributes();

		if (isset($_GET['Firmdocument']))
			$model->setAttributes($_GET['Firmdocument']);
        if (isset($_GET['firm_id'])) {
            $model->firm_id = $_GET['firm_id'];
        }
		$this->render('admin', array(
			'model' => $model,
		));
	}

}
