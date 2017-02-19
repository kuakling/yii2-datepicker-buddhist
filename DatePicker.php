<?php
namespace kuakling\datepicker;
/**
 * \kuakling\datepicker\DatePicker.
 *
 * @author kuakling <kuakling@gmail.com>
 * @since 1.0
 */
class DatePicker extends \yii\base\Widget
{
    public $options = [];
    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->renderInput();
        $asset = DatePickerAsset::register($this->getView());
        $this->registerAsset($asset);
    }
    
    protected function renderInput()
    {
        retutn '<div class="input-group">
    <input type="text" class="form-control" id="test-date">
    <span class="input-group-btn">
        <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i></button>
    </span>
</div>';
    }
    
    public function registerAsset($asset)
    {
        $view = $this->getView();
        $options = array_merge([
            'language' => 'th-th',
            'autoclose' => true
        ], $this->options);
        $jsonOptions = \yii\helpers\Json::encode($options);
        $js[] = <<< JS
$('#test-date').datepicker(jsonOptions);
JS;
        $view->registerJs(implode("\n", $js));
    }
}
