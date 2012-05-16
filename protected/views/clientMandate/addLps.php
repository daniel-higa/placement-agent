<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
    $model->name => array('view', 'id' => $model->id),
	Yii::t('app', 'Add LPs'),
);


//var_dump($lps);
//echo "<br/>";
//var_dump($continents);
echo "<h1>";
echo "Add LPs to Client Mandate: " . $model->id . ' - ' . $model->name . '<br/>';
echo "Description:<br>" ;
echo "</h1>";
echo "<div>" . $model->description ."</div>";
echo 'GP ' . $model->gp_id . ' - ' . $model->gp->firm->name . '<br/>';
?>

<div class="form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'client-mandate-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row">
		<?php echo 'Rank'; ?><br/>
        <?php echo CHtml::checkBoxList("rank", $ranks, Lp::getRankItems() ,array('separator'=>'', 'template'=>'<div class="left">{label}{input} </div>')); ?>
    </div>
    <div style="clear:both;"></div>

    <div style="float: left;">
        <label>Continents</label>
        <div id="divcontainers">
        <?php echo CHtml::checkBoxList("continents", CHtml::listData($model->gp->gpcontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
        </div>
    </div>

    <div style="float: left;  margin-left: 40px;">
        <label>Regions</label>
        <div id="divcontainers">
        <?php echo CHtml::checkBoxList("regions", CHtml::listData($model->gp->gpregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
        </div>
    </div>

    <div style="float: left;  margin-left: 40px;">
        <label>Sectors</label>
        <div id="divcontainers">
        <?php echo CHtml::checkBoxList("sectors", CHtml::listData($model->gp->gpsectors,'sector_id','sector_id'), CHtml::listData(Sector::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
        </div>
    </div>
    <div style="clear:both;"></div>

    <div class="row">
		<?php echo 'Average ticket'; ?><br/>
        <?php echo CHtml::textField("average_ticket", $post['average_ticket']); ?>
    </div>

    <div class="row">
		<?php echo 'Average Annual Invest'; ?><br/>
        <?php echo CHtml::textField("average_inv", $post['average_inv']); ?>
    </div>

<?php
echo GxHtml::submitButton(Yii::t('app', 'search'));
$this->endWidget();
?>
</div>

<?php echo "Match: " . count($lps) . '<br/>';
?>


<div class="form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'client-mandate-form',
        'enableAjaxValidation' => false,
    ));
    ?>


    <table>
    <thead>
        <tr>
            <th>Include</th>
            <th>Firm Name</th>
        </tr>
    </thead>
    <?php echo CHtml::checkBoxList("Lps", array(), $model->LpItems($lps),array('separator'=>'', 'template'=>'<tr><td>{input}</td><td>{label}</td></tr>')); ?>        

    </table>
    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Add Selected'));
    $this->endWidget();
    ?>
</div>
