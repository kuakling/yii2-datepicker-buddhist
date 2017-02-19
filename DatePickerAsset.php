<?php
/**
 * @copyright Copyright &copy; Surakit Choodet, andatech.net, 2017
 * @package yii2-datepicker-buddhist
 * @version 0.1
 */
namespace kuakling\datepicker;

use yii\web\AssetBundle;
/**
 * Asset bundle for DatePicker Widget
 *
 * @author Surakit Choodet <kuakling@gmail.com>
 * @since 1.0
 */
class DatePickerAsset extends AssetBundle
{
    public $sourcePath = '@kuakling/datepicker/assets';
    public $css = [
        'css/datepicker.css',
    ];
    public $js = [
        'js/bootstrap-datepicker.js',
        'js/bootstrap-datepicker-thai.js',
        'js/locales/bootstrap-datepicker.th.js',
    ];
    public $depends = [
        ''yii\bootstrap\BootstrapPluginAsset'',
    ];
}
