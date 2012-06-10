<?php

class EmployeesController extends GxController {

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
				'actions'=>array('create','update', 'updateoffice', 'listRegions', 'admin', 'updateOfficeLink'),
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
			'model' => $this->loadModel($id, 'Employees'),
		));
	}
	
    public function actionUpdateOfficeLink() {
        
        $this->renderPartial('updateOffice', array('post' => $_POST,
            'office' => $this->actionUpdateOffice()
        ));
    }
    
	public function actionUpdateOffice()
    {
            //Offices
            $data = Office::model()->findAll('firm_id=:firm_id', array(':firm_id'=>(int) $_POST['firm_id']));
            foreach($data as $item) {
                return CHtml::tag('option', array('value'=>$item->id),CHtml::encode($item->name),true);
            }
    }
	
	public function actionListRegions()
    {
            //Regions
            $data = Region::model()->findAll('continent_id=:continent_id', array(':continent_id'=>(int) $_POST['continent_id']));
            $data = CHtml::listData($data,'id','name');
			
			$arr = array();
			
            foreach($data as $value=>$name){
				array_push($arr, $value);
			}

            // return data (JSON formatted)
            echo CJSON::encode(array(
              'regions'=>$arr
            ));
    }

	public function actionCreate() {
		$model = new Employees;
        
		if (isset($_POST['Employees'])) {
			$model->setAttributes($_POST['Employees']);

			$relatedData = array(
				'fundsizes' => $_POST['Employees']['fundsizes'] === '' ? null : $_POST['Employees']['fundsizes'],
				);

			if ($model->saveWithRelated($relatedData)) {
				
				if(isset($_POST['employeesregions']))
                {
					$model_regions=$_POST['employeesregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Employeesregion;
						$model_r->employees_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				
				if(isset($_POST['employeescontinents']))
                {
					$model_continents=$_POST['employeescontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Employeescontinent;
						$model_c->employees_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				
				if(isset($_POST['employeessectors']))
                {
					$model_sectors=$_POST['employeessectors'];
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Employeessector;
						$model_c->employees_id = $model->id;
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
        if (isset($_GET['office_id'])) {
            $model->office_id = $_GET['office_id'];
        }
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Employees');


		if (isset($_POST['Employees'])) {
			$model->setAttributes($_POST['Employees']);
            
			$relatedData = array(
				'fundsizes' => $_POST['Employees']['fundsizes'] === '' ? null : $_POST['Employees']['fundsizes'],
				);
                
			if ($model->saveWithRelated($relatedData)) {
			
				Employeesregion::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['employeesregions']))
                {
					$model_regions=$_POST['employeesregions'];
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Employeesregion;
						$model_r->employees_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->save();
					}
				}
				
				Employeescontinent::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['employeescontinents']))
                {
					$model_continents=$_POST['employeescontinents'];
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Employeescontinent;
						$model_c->employees_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->save();
					}
				}
				
				Employeessector::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['employeessectors']))
                {
					$model_sectors=$_POST['employeessectors'];
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Employeessector;
						$model_c->employees_id = $model->id;
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
		
			Employeesregion::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $id)));
			Employeescontinent::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $id)));
			Employeessector::model()->deleteAll(array('condition' => 'employees_id = :ID', 'params' => array(':ID' => $id)));
			$this->loadModel($id, 'Employees')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$this->redirect(array('admin'));
	}

	public function actionAdmin() {
		$model = new Employees('search');
		$model->unsetAttributes();

		if (isset($_GET['Employees']))
			$model->setAttributes($_GET['Employees']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
