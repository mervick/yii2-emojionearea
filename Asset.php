<?php

namespace mervick\emojionearea;

/**
 * Class Asset
 * @package mervick\emojionearea
 */
class Asset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/mervick/emojionearea';

    public $depends = [
        'yii\web\JqueryAsset',
        'mervick\emojionearea\EmojiOneAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->js = [ !YII_DEBUG ? 'js/emojionearea.min.js' : 'js/emojionearea.js'];
        $this->css = [ !YII_DEBUG ? 'css/emojionearea.min.css' : 'css/emojionearea.css'];

        parent::init();
    }
}