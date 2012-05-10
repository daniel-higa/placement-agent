<?php

class ClientMandateController extends GxController {

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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'addLps'),
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
			'model' => $this->loadModel($id, 'ClientMandate'),
		));
	}
    
	public function actionCreate() {
		$model = new ClientMandate;

		if (isset($_POST['ClientMandate'])) {
			$model->setAttributes($_POST['ClientMandate']);

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
		$model = $this->loadModel($id, 'ClientMandate');


		if (isset($_POST['ClientMandate'])) {
			$model->setAttributes($_POST['ClientMandate']);

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
			$this->loadModel($id, 'ClientMandate')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ClientMandate');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ClientMandate('search');
		$model->unsetAttributes();

		if (isset($_GET['ClientMandate']))
			$model->setAttributes($_GET['ClientMandate']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
    
    public function actionAddLps($id) {
        $model = ClientMandate::model()->findByPk($id);
        $continents = array();
        $regions = array();
        $sectors = array();
        $ranks = array('A');
        $post = $_POST;
        $post['average_ticket'] = isset($post['average_ticket'])?$post['average_ticket']:'>= 0';
        $post['average_inv'] = isset($post['average_inv'])?$post['average_inv']:'>= 0';
        $lps = array();
        if (isset($_POST['continents'])) {
            $continents = array_values($_POST['continents']);
        }
        if (isset($_POST['regions'])) {
            $regions = array_values($_POST['regions']);
        }
        if (isset($_POST['sectors'])) {
            $sectors = array_values($_POST['sectors']);
        }
        if (isset($_POST['rank'])) {
            $ranks = array_values($_POST['rank']);
        }
        if (isset($_POST['Lps'])) {  //add lps to client mandate
            $model->addLps(array_values($_POST['Lps']));
            $this->redirect(array('view', 'id' => $model->id));
        }
        if (isset($_POST['continents']) or isset($_POST['regions']) or isset($_POST['sectors'])) {
            $lps = $model->findLps($ranks, $continents, $regions, $sectors, $post);
        }
		$this->render('addLps', array(
            'model' => $model,
            'post' => $post,
            'lps' => $lps,
            'continents'  => $continents,
            'ranks' => $ranks
		));
	}

}
