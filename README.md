# yii2-emojionearea
Yii2 widget for EmojiOne Area

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mervick/yii2-emojionearea "*"
```

or add

```
"mervick/yii2-emojionearea": "*"
```

to the require section of your `composer.json` file.

Using
------------
With ActiveForm:
```php
<?= $form->field($model, 'name')->widget(\mervick\emojionearea\Widget::className(), []); ?>
```
Alone:
```php
<?= \mervick\emojionearea\Widget::widget(['name' => 'example']); ?>
```
