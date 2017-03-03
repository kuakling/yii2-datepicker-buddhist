<?php
namespace kuakling\datepicker\behaviors;

use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

class DateBuddhistBehavior extends AttributeBehavior
{
    public $dateAttribute = 'date';
    
    public $yearDistance = 543;
    
    /**
     * @inheritdoc
     *
     * In case, when the value is `null`, the result of the PHP function [time()](http://php.net/manual/en/function.time.php)
     * will be used as value.
     */
    public $value;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->attributes = [
            BaseActiveRecord::EVENT_BEFORE_INSERT => $this->dateAttribute,
            BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->dateAttribute,
        ];
        
    }

    /**
     * @inheritdoc
     *
     * In case, when the [[value]] is `null`, the result of the PHP function [time()](http://php.net/manual/en/function.time.php)
     * will be used as value.
     */
    protected function getValue($event)
    {
        if ($this->value === null) {
            // $attribute1 = $this->christianAttribute;
            // $attribute2 = $this->buddhistAttribute;
            // $value1 = $this->owner->{$attribute1};
            // $value2 = $this->owner->{$attribute2};
            // $explode1 = explode('-', $value1);
            // $explode2 = explode('/', $value2);
            // $year1 = intval($explode1[0]);
            // $year2 = intval($explode2[2]);
            
            // $r = null;
            // switch($event->name) {
            //     case 'afterFind' : $r = $explode1[2].'/'.$explode1[1].'/'.strval(($year1 + $this->yearDistance));
            //         break;
            //     case 'beforeUpdate' : $r = strval(($year2 - $this->yearDistance).'-'.$explode2[1].'-'.$explode2[0]);
            //         break;
            //     case 'beforeInsert' : $r = strval(($year2 - $this->yearDistance).'-'.$explode2[1].'-'.$explode2[0]);
            //         break;
            // }
            
            // return $r;
            
            
            $attribute = $this->dateAttribute;
            $value = $this->owner->{$attribute};
            if(!$value){
                return null;
            }
            $exp = explode('/', $value);
            $year = intval($exp[2]);
            
            return strval($year - $this->yearDistance).'-'.$exp[1].'-'.$exp[0];
        }
        return parent::getValue($event);
    }
}
?>