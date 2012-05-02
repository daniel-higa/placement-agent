<?php

class FirmController extends GxController {

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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin'),
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
			'model' => $this->loadModel($id, 'Firm'),
		));
	}
	
	public function actionCreate() {
		$model = new Firm;
		if (isset($_POST['Firm'])) {
		
		$firms = Firm::model()->findAll(array('condition' => 'name = :ID', 'params' => array(':ID' => $_POST["Firm"]["name"])));
		
		if(count($firms) > 0){
			Yii::app()->clientScript->registerScript('alert', "alert('The firm name is being used.');");
			
		} else {
		
				$model->setAttributes($_POST['Firm']);
	
				if ($model->save()) {
				
					if(isset($_POST['firmregions']))
					{
						$model_regions=$_POST['firmregions'];
						for ($i=0;$i<count($model_regions);$i++){
							$model_r=new Firmregion;
							$model_r->firm_id = $model->id;
							$model_r->region_id = $model_regions[$i];
							$model_r->save();
						}
					}
					
					if(isset($_POST['firmcontinents']))
					{
						$model_continents=$_POST['firmcontinents'];
						for ($i=0;$i<count($model_continents);$i++){
							$model_c=new Firmcontinent;
							$model_c->firm_id = $model->id;
							$model_c->continent_id = $model_continents[$i];
							$model_c->save();
						}
					}
					
					$limit=count($_FILES['firmfiles']['name']);
					for($i=0;$i<$limit;$i++){
						$ext = end(explode(".", $_FILES['firmfiles']['name'][$i]));
						$nm = $model->id.'_'.date("YmdHis").'_'.($i+1).'.'.$ext;
						if(move_uploaded_file($_FILES['firmfiles']['tmp_name'][$i], "upload/".$nm)){
							$model_d=new Firmdocument;
							$model_d->firm_id = $model->id;
							$model_d->file = $nm;
							$model_d->save();
						}
					}
					
					if (Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
						$this->redirect(array('view', 'id' => $model->id));
				}
			}
		
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Firm');

		if (isset($_POST['Firm'])) {
			$model->setAttributes($_POST['Firm']);

			if ($model->save()) {
			
				Firmregion::model()->deleteAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['firmregions']))
                {	
					$model_regions=$_POST['firmregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Firmregion;
						$model_r->firm_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				Firmcontinent::model()->deleteAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['firmcontinents']))
                {	
					$model_continents=$_POST['firmcontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Firmcontinent;
						$model_c->firm_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				$limit=count($_FILES['firmfiles']['name']);
				for($i=0;$i<$limit;$i++){
					$ext = end(explode(".", $_FILES['firmfiles']['name'][$i]));
					$nm = $model->id.'_'.date("YmdHis").'_'.($i+1).'.'.$ext;
					if(move_uploaded_file($_FILES['firmfiles']['tmp_name'][$i], "upload/".$nm)){
						$model_d=new Firmdocument;
						$model_d->firm_id = $model->id;
						$model_d->file = $nm;
						$model_d->save();
					}
				}
				
				if(isset($_POST['HD_deleteDocuments'])){
					$arrs = explode(';',$_POST['HD_deleteDocuments']);
					for ($i=0;$i<count($arrs);$i++){
						Firmdocument::model()->deleteAll(array('condition' => 'id = :ID', 'params' => array(':ID' => $arrs[$i])));
					}
				}
			
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
		
			$emps = Employees::model()->findAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $id)));
			if(count($emps) > 0){
				throw new CHttpException(403, Yii::t('app', 'The firm is being used in the employees table.'));
			} else {
				Firmregion::model()->deleteAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $id)));
				Firmcontinent::model()->deleteAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $id)));
				Firmdocument::model()->deleteAll(array('condition' => 'firm_id = :ID', 'params' => array(':ID' => $id)));
			
				$this->loadModel($id, 'Firm')->delete();
				
				if (!Yii::app()->getRequest()->getIsAjaxRequest())
					$this->redirect(array('admin'));
			}

			
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Firm');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Firm('search');
		$model->unsetAttributes();

		if (isset($_GET['Firm']))
			$model->setAttributes($_GET['Firm']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
