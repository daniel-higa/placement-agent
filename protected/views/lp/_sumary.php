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

        <?php if ($firm->lp) { ?>
            <?php $lp = $firm->lp;?>
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
            <div class="left append-1">
                <label>Sectors</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("Firmsectors", CHtml::listData($lp->lpsectors,'sector_id','sector_id'), CHtml::listData($lp->lpsectors,'sector_id','sector.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Targets</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("Firmtargets", CHtml::listData($lp->lptargets,'target_id','target_id'), CHtml::listData($lp->lptargets,'target_id','target.name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
            <div class="left append-1">
                <label>Segments</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("Firmsegments", CHtml::listData($lp->lpsegments,'segment_id','segment_id'), CHtml::listData($lp->segments,'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'assets_umgmt'); ?>:
                <?php echo $lp->assets_umgmt ?>
            </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'pe_allocation'); ?>:
                <?php echo $lp->pe_allocation; ?>
            </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'commited_pe'); ?>:
                <?php echo $lp->commited_pe; ?>
            </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'average_inv'); ?>:
                <?php echo $lp->average_inv; ?>
            </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'average_ticket'); ?>:
                <?php echo $lp->average_ticket; ?>
            </div>
            <div class="left append-1">
                <label>Fund size</label>
                <div id="divcontainers">
                <?php echo CHtml::checkBoxList("Firmsfundsize", CHtml::listData($lp->lpfundsizes,'fundsize_id','fundsize_id'), CHtml::listData($lp->fundsizes,'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>', 'disabled' => 'true')); ?>
                </div>
            </div>
            <div class="left append-1">
                <?php echo CHtml::activeLabel($lp, 'actively'); ?>:
                <?php echo $lp->actively(); ?>
            </div>
            <?php if ($lp->actively) { ?>
                <div class="left append-1">
                    <?php echo CHtml::activeLabel($lp, 'appetite'); ?>:
                    <?php echo $lp->appetite(); ?>
                </div>
            <?php } ?>
        <?php } ?>
        
        <div class="left">
            <label>Responsible</label>:
            <?php echo $firm->responsible(); ?>
        </div>
        
        <div class="clearfix"> </div>
        <?php
            if (!$firm->lp) {
                echo '<h2>Missing second step!</h2>';
            }
        ?>
    </div>
</div>
