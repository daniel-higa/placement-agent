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
				'actions'=>array('create','update', 'admin', 'funds', 'communications', 'projects', 'chooseType'),
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

    public function actionChooseType() {
		$this->render('choose_type');
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Firm'),
		));
	}

	public function actionCommunications($id) {
		$communication = new Communication('search');
		$communication->unsetAttributes();

		if (isset($_GET['Communication']))
			$communication->setAttributes($_GET['Communication']);
    
		$this->render('communications', array(
			'model' => $this->loadModel($id, 'Firm'),
            'communication' => $communication,
		));
	}
    
	public function actionProjects($id) {
   		$clientmandate = new ClientMandate('search');
		$clientmandate->unsetAttributes();

		if (isset($_GET['ClientMandate']))
			$clientmandate->setAttributes($_GET['ClientMandate']);
		$this->render('projects', array(
			'model' => $this->loadModel($id, 'Firm'),
            'clientmandate' => $clientmandate,
		));
	}
    
    public function actionFunds($id) {
		$this->render('funds', array(
			'model' => $this->loadModel($id, 'Firm'),
		));
	}

	public function actionCreate() {
		$model = new Firm;
        
        if (isset($_GET['type'])) {
            $model->firmtype_id = $_GET['type'];
        }
        
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
					
					if (Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
                        if ($model->firmtype_id == 1) {
                            $this->redirect(array('/gp/create', 'firm_id' => $model->id));
                        } elseif ($model->firmtype_id == 2) {
                            $this->redirect(array('/lp/create', 'firm_id' => $model->id));
                        } else {
                            $this->redirect(array('view', 'id' => $model->id));
                        }
				}
			}
		
		}

        $model->rank = 'E';
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
				
				if(isset($_POST['HD_deleteDocuments'])){
					$arrs = explode(';',$_POST['HD_deleteDocuments']);
					for ($i=0;$i<count($arrs);$i++){
						Firmdocument::model()->deleteAll(array('condition' => 'id = :ID', 'params' => array(':ID' => $arrs[$i])));
					}
				}
                if ($model->firmtype_id == 1) {
                    if ($model->gp) {
                        $this->redirect(array('/gp/update', 'id' => $model->gp->id));
                    } else {
                        $this->redirect(array('/gp/create', 'firm_id' => $model->id));
                    }
                } elseif ($model->firmtype_id == 2) {
                    if ($model->lp) {
                        $this->redirect(array('/lp/update', 'id' => $model->lp->id));
                    } else {
                        $this->redirect(array('/lp/create', 'firm_id' => $model->id));
                    }
                } else {
                    $this->redirect(array('view', 'id' => $model->id));
                }
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
        $this->redirect(array('admin'));
	}

	public function actionAdmin() {
        Yii::app()->user->setState('pageSize', 200);
		$model = new Firm('search');
		$model->unsetAttributes();

		if (isset($_GET['Firm']))
			$model->setAttributes($_GET['Firm']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
