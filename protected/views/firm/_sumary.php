<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->firmtype->name) . ': ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<div class="sumary">
    <div class="margin-20">
        <div class="row">
            <h1><?php echo $model->name; ?></h1>
        </div>
        <div class="row">
            <?php echo CHtml::label('Rank:', '', array('class' => 'left')); ?>
            <?php echo CHtml::radioButtonList('rank', $model->rank, Firm::getRankItems(), array('class' => 'left', 'template' => '<span class="left">{input}</span><span class="left">{label}</span>', 'disabled' => true, 'separator' => '&nbsp;')); ?>
            <div class="clearfix"></div>
        </div>

        <?php if ($model->firmtype_id == 1 and $model->gp) { ?>
            <?php $gp = $model->gp; ?>
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

        <?php } elseif ($model->firmtype_id == 2 and $model->lp) { ?>
            <?php $lp = $model->lp;?>
            <div class="left append-1">
                <label>Continents</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmcontinents", CHtml::listData($lp->lpcontinents,'continent_id','continent_id'), CHtml::listData($lp->lpcontinents,'continent_id','continent.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => true)); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Regions</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmregions", CHtml::listData($lp->lpregions,'region_id','region_id'), CHtml::listData($lp->lpregions,'region_id','region.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>

        <?php } else { ?>
            <div class="left append-1">
                <label>Continents</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmcontinents", CHtml::listData($model->firmcontinents,'continent_id','continent_id'), CHtml::listData($model->firmcontinents,'continent_id','continent.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => true)); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Regions</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("firmregions", CHtml::listData($model->firmregions,'region_id','region_id'), CHtml::listData($model->firmregions,'region_id','region.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
        <?php } ?>

        <div class="left">
            <label>Responsible</label>
            <div id="containers">
                <?php echo $model->responsible(); ?>
            </div>
        </div>
        
        <div class="clearfix"> </div>
        <p>Created: <?php echo $model->created; ?>
        Modified: <?php echo $model->modified; ?> </p>
        <?php
            if (($model->firmtype_id == 1 and !$model->gp) or ($model->firmtype_id == 2 and !$model->lp)) { 
                echo '<h2>Missing second step!</h2>';
            }
        ?>
    </div>
</div>
