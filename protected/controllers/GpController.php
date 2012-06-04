<?php

class GpController extends GxController {

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
        $model = Gp::model()->findByPk($id);
        $this->redirect(array('/firm/view', 'id' => $model->firm_id));
	}

	public function actionCreate() {
		$model = new Gp;
        
        if (isset($_GET['firm_id'])) {
            $model->firm_id = $_GET['firm_id'];
            $model->rank = $model->firm->rank;
        } else {
            $this->redirect(array('firm/create', 'type' => 1));
        }

		if (isset($_POST['Gp'])) {
			$model->setAttributes($_POST['Gp']);
			
			$f = Firm::model()->findByPk($_POST['Gp']['firm_id']);
			
			$model->name = $f->name;
			$model->description = $f->description;
			$model->website = $f->website;

			if ($model->save()) {
			
				if(isset($_POST['gpregions']))
                {
					$model_regions=$_POST['gpregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Gpregion;
						$model_r->gp_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				
				if(isset($_POST['gpcontinents']))
                {
					$model_continents=$_POST['gpcontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Gpcontinent;
						$model_c->gp_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				
				if(isset($_POST['gpsectors']))
                {
					$model_sectors=$_POST['gpsectors'];
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Gpsector;
						$model_c->gp_id = $model->id;
						$model_c->sector_id = $model_sectors[$i];
						$model_c->save();
					}
				}
				
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
            'model' => $model,
        ));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Gp');


		if (isset($_POST['Gp'])) {
			$model->setAttributes($_POST['Gp']);

			if ($model->save()) {
				
				Gpregion::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['gpregions']))
                {
					$model_regions=$_POST['gpregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Gpregion;
						$model_r->gp_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				Gpcontinent::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['gpcontinents']))
                {
					$model_continents=$_POST['gpcontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Gpcontinent;
						$model_c->gp_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				Gpsector::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['gpsectors']))
                {
					$model_sectors=$_POST['gpsectors'];
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Gpsector;
						$model_c->gp_id = $model->id;
						$model_c->sector_id = $model_sectors[$i];
						$model_c->save();
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
			
			Gpregion::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $id)));
			Gpcontinent::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $id)));
			Gpsector::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $id)));
			Gpdocument::model()->deleteAll(array('condition' => 'gp_id = :ID', 'params' => array(':ID' => $id)));
			
			$this->loadModel($id, 'Gp')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Gp');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Gp('search');
		$model->unsetAttributes();

		if (isset($_GET['Gp']))
			$model->setAttributes($_GET['Gp']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
