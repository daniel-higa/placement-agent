<?php

class FirmHelper {

    public static function viewUrl($firm) {
        switch ($firm->firmtype->name) {
            case 'GP':
                return '<a href="' . Yii::app()->createUrl('/firm/view', array('id' => $firm->id )) . '">' . $firm->name . '</a>';
            case 'LP':
                return '<a href="' . Yii::app()->createUrl('/firm/view', array('id' => $firm->id )) . '">' . $firm->name . '</a>';;
            default:
                return '<a href="' . Yii::app()->createUrl('/firm/view', array('id' => $firm->id )) . '">' . $firm->name . '</a>';;
        }
    }
    
    public static function div($class, $content) {
        return "<div class='$class'>" . $content . '</div>';
    }
    
    public static function getGPName($id) {
        if (isset($id) and ($gp = Gp::model()->findByPk($id))) {
            if ($gp->firm) {
                return $gp->firm->name;
            }
        }
        return 'N/A';
    }

}
