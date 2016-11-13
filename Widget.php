<?php

namespace mervick\emojionearea;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class Widget
 * @package mervick\emojionearea
 */
class Widget extends InputWidget
{

    /**
     * @var array the HTML attributes for the textarea input
     */
    public $options;

    /**
     * @var array Plugin options that will be passed to the emojioneArea
     */
    public $pluginOptions;


    /**
     * Initialize the widget
     */
    public function init()
    {
        parent::init();

        $this->generateId();
        $this->registerAssets();
        echo $this->renderInput();
    }

    /**
     * Generate HTML identifiers for elements
     */
    protected function generateId()
    {
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        } else {
            $this->options['id'] = preg_replace('/[^a-z0-9_]/i', '_', $this->options['id']);
        }
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        Asset::register($view);

        $pluginOptions = !empty($this->pluginOptions) ? Json::encode($this->pluginOptions) : '';

        $js = <<<JS
    window.emojioneArea_{$this->options['id']} = jQuery("#{$this->options['id']}").emojioneArea($pluginOptions);
JS;
        Yii::$app->getView()->registerJs($js);
    }

    /**
     * Render the text area input
     */
    protected function renderInput()
    {
        if ($this->hasModel()) {
            $input = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textarea($this->name, $this->value, $this->options);
        }
        return $input;
    }
}