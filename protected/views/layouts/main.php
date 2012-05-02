<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><!--<?php echo CHtml::encode(Yii::app()->name); ?>--><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg"></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('ext.CDropDownMenu.CDropDownMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Projects',
                      'url'=>array(''),
                      'items' =>  array(
                           array('label'=>'Client Mandate', 'url'=>array('/clientMandate/admin'))
                           ),
                      'visible'=>!Yii::app()->user->isGuest,
                ),
                array('label'=>'tag', 'url'=>array('/tag/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Firm', 'url'=>array('/firm'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Office', 'url'=>array('/office'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Employees', 'url'=>array('/employees'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'GP', 'url'=>array('/gp'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'LP', 'url'=>array('/lp'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=> 'Config', 'items' => array(
                            array('label' => 'Tag', 'url' => array('/tag')),
                            array('label' => 'Target', 'url' => array('/target')),
                        ),
                        'visible'=>!Yii::app()->user->isGuest,
                        'url' => '',
                    ),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Placement Agent
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
