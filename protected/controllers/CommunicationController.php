<?php

class CommunicationController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view', 'ajax_lp', 'ajax_employee'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update', 'admin'),
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

    public function actionAjax_lp() {
        $data = ClientMandate::model()->findByPk($_POST['Communication']['client_mandate_id'])->lps;
        echo CHtml::tag('option', array('value'=>''),CHtml::encode('Choose one'),true);
        foreach($data as $item)
        {
            echo CHtml::tag('option', array('value'=>$item->id),CHtml::encode($item->firm->name),true);
        }
    }

    public function actionAjax_employee() {
        $data = Lp::model()->findByPk($_POST['Communication']['lp_id'])->getEmployees();
        echo CHtml::tag('option', array('value'=>''),CHtml::encode('Choose one'),true);
        foreach($data as $item)
        {
            echo CHtml::tag('option', array('value'=>$item->id),CHtml::encode($item->last_name . ', ' . $item->first_name),true);
        }
    }


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Communication'),
		));
	}

	public function actionCreate() {
		$model = new Communication;
        
        $model->user_id = Yii::app()->user->id;
        $model->todo_user_id = Yii::app()->user->id;

		if (isset($_POST['Communication'])) {
			$model->setAttributes($_POST['Communication']);
			$relatedData = array(
				'tags' => $_POST['Communication']['tags'] === '' ? null : $_POST['Communication']['tags'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
        

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Communication');


		if (isset($_POST['Communication'])) {
			$model->setAttributes($_POST['Communication']);
			$relatedData = array(
				'tags' => $_POST['Communication']['tags'] === '' ? null : $_POST['Communication']['tags'],
				);
            CommunicationTag::model()->deleteAll(array('condition' =>'communication_id = :cid', 'params' => array(':cid' => $model->id)));
			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Communication')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
        $this->redirect(array('admin'));
	}

	public function actionAdmin() {
		$model = new Communication('search');
		$model->unsetAttributes();

		if (isset($_GET['Communication']))
			$model->setAttributes($_GET['Communication']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
