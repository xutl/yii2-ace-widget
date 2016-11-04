适用于 Yii2 的 ACE 扩展
==============================

该插件非免费插件也不授权任何人使用。

安装
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist xutl/yii2-ace-widget
```

or add

```
"xutl/yii2-ace-widget": "~1.0"
```

to the `require` section of your `composer.json`.

使用
-----

一但安装了该扩展，可以使用下面的代码调用编辑器 :

```php
<?= \xutl\ace\AceEdit::widget(
    [
        'mode'=>'html',
        'theme'=>'github',
        'containerOptions'=>[
            'style'=>'width: 100%; min-height: 400px',
        ]
    ]
); ?>
````

在表单中使用

```php
<?= \xutl\ace\AceEditInput::widget(
    [
        'model'=>$model,
        'attribute'=>$attribute,
        'mode'=>'html',
        'theme'=>'github',
        'containerOptions'=>[
            'style'=>'width: 100%; min-height: 400px',
        ]
    ]
); ?>

<?= $form->field($model, 'content')->widget(\xutl\ace\AceEditInput::className(),
        [
            'mode' => 'text',
            'theme' => 'chrome'
        ]); ?>
````