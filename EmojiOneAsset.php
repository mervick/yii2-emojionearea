<?php

namespace mervick\emojionearea;

/**
 * Class EmojiOneAsset
 * @package mervick\emojionearea
 */
class EmojiOneAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/emojione/emojione';


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->js = [ !YII_DEBUG ? 'lib/js/emojione.min.js' : 'lib/js/emojione.js'];
        $this->css = [ !YII_DEBUG ? 'assets/css/emojione.min.css' : 'assets/css/emojione.css'];

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function publish($am)
    {
        parent::publish($am);

        $js = <<<JS
jQuery(document).ready(function() {
    emojione.imagePathPNG = '{$this->basePath}/assets/png/';
});
JS;
        \Yii::$app->view->registerJs($js);
    }
}