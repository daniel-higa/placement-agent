<?php

class StatusController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Status'),
		));
	}

	public function actionCreate() {
		$model = new Status;


		if (isset($_POST['Status'])) {
			$model->setAttributes($_POST['Status']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Status');


		if (isset($_POST['Status'])) {
			$model->setAttributes($_POST['Status']);

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
			$this->loadModel($id, 'Status')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Status');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Status('search');
		$model->unsetAttributes();

		if (isset($_GET['Status']))
			$model->setAttributes($_GET['Status']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}