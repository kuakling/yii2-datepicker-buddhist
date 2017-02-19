# yii2-datepicker-buddhist

## Install
composer require kuakling/yii2-datepicker-buddhist "dev-master"

## Usage
~~~ php
use yii\bootstrap\ActiveForm;
use kuakling\datepicker\DatePicker;

$form = ActiveForm::begin();

echo $form->field($model, 'birthday')->widget(DatePicker::className());

ActiveForm::end();

echo DatePicker::widget([
    'name' => 'mydate',
]);
~~~

## แปลงเป็นฟอร์แมต Y-m-d ก่อนบันทึก
~~~ php
//Your Model

public function behaviors()
    {
        return [
            ...
            'birthday' =>[
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'birthday',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'birthday',
                ],
                'value' => function($event) {
                    $split = explode('/', $this->birthday);
                    if(count($split) === 3){
                        $thYear = intval($split[2]);
                        $glYear = $thYear-543;
                        $value = $glYear.'-'.$split[1].'-'.$split[0];
                    }else{
                        $value = null;
                    }
                    
                    return $value;
                },
            ],
        ];
    }
~~~

## ถ้าให้หรอยเหลย ติดตั้ง [thaiFormatter](https://github.com/dixonsatit/yii2-thai-year-formatter)
~~~
composer require --prefer-dist dixonsatit/yii2-thai-year-formatter "*"
~~~
### แล้วเพิ่ม config formatter (Yii จะเปลี่ยนมาใช้ formatter ของตัวนี้แทน)
~~~ php
//[backend][frontend]/config/main.php
return [
    ...
    'components' => [
        ...
        'formatter'=>[
            'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
    ],
    ...
];
~~~
