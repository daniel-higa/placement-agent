<?php

class LpController extends GxController {

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
		$model = Lp::model()->findByPk($id);
        $this->redirect(array('/firm/view', 'id' => $model->firm_id));
	}

	public function actionCreate() {
		$model = new Lp;

        if (isset($_GET['firm_id'])) {
            $model->firm_id = $_GET['firm_id'];
            $model->rank = $model->firm->rank;
        } else {
            $this->redirect(array('firm/create', 'type' => 2));
        }

		if (isset($_POST['Lp'])) {
			$model->setAttributes($_POST['Lp']);
			
			$f = Firm::model()->findByPk($_POST['Lp']['firm_id']);
			
			$model->name = $f->name;
			$model->description = $f->description;
			$model->website = $f->website;
            
            $relatedData = array(
				'fundsizes' => $_POST['Lp']['fundsizes'] === '' ? null : $_POST['Lp']['fundsizes'],
			);

			if ($model->saveWithRelated($relatedData)) {
			
				if(isset($_POST['lpregions']))
                {
					$model_regions=$_POST['lpregions'];
					$model_regionstops=isset($_POST['lpregions2']) ? $_POST['lpregions2'] : null;
					
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Lpregion;
						$model_r->lp_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->top = 0;
						if($model_regionstops != null){
							for ($j=0;$j<count($model_regionstops);$j++){
								if($model_regionstops[$j] == $model_regions[$i]){
									$model_r->top = 1;
									break;
								}
							}
						}
						$model_r->save();
					}
				}
				
				
				if(isset($_POST['lpcontinents']))
                {
					$model_continents=$_POST['lpcontinents'];
					$model_continentstops=isset($_POST['lpcontinents2']) ? $_POST['lpcontinents2'] : null;
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Lpcontinent;
						$model_c->lp_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->top = 0;
						if($model_continentstops != null){
							for ($j=0;$j<count($model_continentstops);$j++){
								if($model_continentstops[$j] == $model_continents[$i]){
									$model_c->top = 1;
									break;
								}
							}
						}
						$model_c->save();
					}
				}
				
				
				if(isset($_POST['lpsectors']))
                {
					$model_sectors=$_POST['lpsectors'];
					$model_sectorstops=isset($_POST['lpsectors2']) ? $_POST['lpsectors2'] : null;
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Lpsector;
						$model_c->lp_id = $model->id;
						$model_c->sector_id = $model_sectors[$i];
						$model_c->top = 0;
						if($model_sectorstops != null){
							for ($j=0;$j<count($model_sectorstops);$j++){
								if($model_sectorstops[$j] == $model_sectors[$i]){
									$model_c->top = 1;
									break;
								}
							}
						}
						$model_c->save();
					}
				}
				
				if(isset($_POST['lptargets']))
                {
					$model_targets=$_POST['lptargets'];
					for ($i=0;$i<count($model_targets);$i++){
						$model_t=new Lptarget;
						$model_t->lp_id = $model->id;
						$model_t->target_id = $model_targets[$i];
						$model_t->save();
					}
				}
                
				if(isset($_POST['lpsegments']))
                {
					$model_segments=$_POST['lpsegments'];
					for ($i=0;$i<count($model_segments);$i++){
						$model_t=new Lpsegment;
						$model_t->lp_id = $model->id;
						$model_t->segment_id = $model_segments[$i];
						$model_t->save();
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
		$model = $this->loadModel($id, 'Lp');


		if (isset($_POST['Lp'])) {
			$model->setAttributes($_POST['Lp']);
            
            $relatedData = array(
				'fundsizes' => $_POST['Lp']['fundsizes'] === '' ? null : $_POST['Lp']['fundsizes'],
			);

			if ($model->saveWithRelated($relatedData)) {
			
				Lpregion::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['lpregions']))
                {
					$model_regions=$_POST['lpregions'];
					$model_regionstops=isset($_POST['lpregions2']) ? $_POST['lpregions2'] : null;
					
					for ($i=0;$i<count($model_regions);$i++){
						$model_r=new Lpregion;
						$model_r->lp_id = $model->id;
						$model_r->region_id = $model_regions[$i];
						$model_r->top = 0;
						if($model_regionstops != null){
							for ($j=0;$j<count($model_regionstops);$j++){
								if($model_regionstops[$j] == $model_regions[$i]){
									$model_r->top = 1;
									break;
								}
							}
						}
						$model_r->save();
					}
				}
				
				Lpcontinent::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['lpcontinents']))
                {
					$model_continents=$_POST['lpcontinents'];
					$model_continentstops=isset($_POST['lpcontinents2']) ? $_POST['lpcontinents2'] : null;
					
					for ($i=0;$i<count($model_continents);$i++){
						$model_c=new Lpcontinent;
						$model_c->lp_id = $model->id;
						$model_c->continent_id = $model_continents[$i];
						$model_c->top = 0;
						if($model_continentstops != null){
							for ($j=0;$j<count($model_continentstops);$j++){
								if($model_continentstops[$j] == $model_continents[$i]){
									$model_c->top = 1;
									break;
								}
							}
						}
						$model_c->save();
					}
				}
				
				Lpsector::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['lpsectors']))
                {
					$model_sectors=$_POST['lpsectors'];
					$model_sectorstops=isset($_POST['lpsectors2']) ? $_POST['lpsectors2'] : null;
					for ($i=0;$i<count($model_sectors);$i++){
						$model_c=new Lpsector;
						$model_c->lp_id = $model->id;
						$model_c->sector_id = $model_sectors[$i];
						$model_c->top = 0;
						if($model_sectorstops != null){
							for ($j=0;$j<count($model_sectorstops);$j++){
								if($model_sectorstops[$j] == $model_sectors[$i]){
									$model_c->top = 1;
									break;
								}
							}
						}
						$model_c->save();
					}
				}
				
				Lptarget::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['lptargets']))
                {
					$model_targets=$_POST['lptargets'];
					for ($i=0;$i<count($model_targets);$i++){
						$model_t=new Lptarget;
						$model_t->lp_id = $model->id;
						$model_t->target_id = $model_targets[$i];
						$model_t->save();
					}
				}
                
                Lpsegment::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $model->id)));
				if(isset($_POST['lpsegments']))
                {
					$model_segments=$_POST['lpsegments'];
					for ($i=0;$i<count($model_segments);$i++){
						$model_t=new Lpsegment;
						$model_t->lp_id = $model->id;
						$model_t->segment_id = $model_segments[$i];
						$model_t->save();
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
		
			Lpregion::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $id)));
			Lpcontinent::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $id)));
			Lpsector::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $id)));
			Lptarget::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $id)));
			Lpdocument::model()->deleteAll(array('condition' => 'lp_id = :ID', 'params' => array(':ID' => $id)));
		
			$this->loadModel($id, 'Lp')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		/*$dataProvider = new CActiveDataProvider('Lp');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));*/
        $this->redirect(array('/firm/admin'));
	}

	public function actionAdmin() {
		/*$model = new Lp('search');
		$model->unsetAttributes();

		if (isset($_GET['Lp']))
			$model->setAttributes($_GET['Lp']);

		$this->render('admin', array(
			'model' => $model,
		));*/
        $this->redirect(array('/firm/admin'));
	}

}
