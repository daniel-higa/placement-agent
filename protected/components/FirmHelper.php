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

}
