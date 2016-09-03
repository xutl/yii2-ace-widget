<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\ace;

use yii\web\AssetBundle;

class AceEditAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xutl/yii2-ace-widget/assets';

    public $js = [
        'src-min-noconflict/ace.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}