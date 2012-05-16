<?php

class TodoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Todo'),
		));
	}

	public function actionCreate() {
		$model = new Todo;
        if (isset($_GET['communication_id'])) {
            $model->communication_id = $_GET['communication_id'];
        }
        $model->create_at = date('Y-m-d');


		if (isset($_POST['Todo'])) {
			$model->setAttributes($_POST['Todo']);

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
		$model = $this->loadModel($id, 'Todo');


		if (isset($_POST['Todo'])) {
			$model->setAttributes($_POST['Todo']);

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
			$this->loadModel($id, 'Todo')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
        $this->redirect(array('admin'));
    }

	public function actionAdmin() {
		$model = new Todo('search');
		$model->unsetAttributes();

		if (isset($_GET['Todo']))
			$model->setAttributes($_GET['Todo']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
