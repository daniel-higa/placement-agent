<div class="sumary">
    <div class="margin-20">
        <div class="row">
            <h1><?php echo $firm->name; ?></h1>
        </div>
        <div class="row">
            <?php echo CHtml::label('Rank:', '', array('class' => 'left')); ?>
            <?php echo CHtml::radioButtonList('rank', $firm->rank, Firm::getRankItems(), array('class' => 'left', 'template' => '<span class="left">{input}</span><span class="left">{label}</span>', 'disabled' => true, 'separator' => '&nbsp;')); ?>
            <div class="clearfix"></div>
        </div>

        <?php if ($firm->gp) { ?>
            <?php $gp = $firm->gp; ?>
            <div class="left append-1">
                <label>Continents</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmcontinents", CHtml::listData($gp->gpcontinents,'continent_id','continent_id'), CHtml::listData($gp->gpcontinents,'continent_id','continent.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => true)); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Regions</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmregions", CHtml::listData($gp->gpregions,'region_id','region_id'), CHtml::listData($gp->gpregions,'region_id','region.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Sectors</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmsectors", CHtml::listData($gp->gpsectors,'sector_id','sector_id'), CHtml::listData($gp->gpsectors,'sector_id','sector.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
        <?php } ?>
        
        <div class="left">
            <label>Responsible</label>
            <div id="containers">
                <?php echo $firm->responsible(); ?>
            </div>
        </div>
        
        <div class="clearfix"> </div>

        <?php
            if (!$firm->gp) { 
                echo '<h2>Missing second step!</h2>';
            } else {
                echo '<a href="' . Yii::app()->createUrl('/gp/update', array('id' => $gp->id)) . '"><button>Edit</button></a>';
            }
        ?>
    </div>
</div>
