<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\ace;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class AceEdit
 * @package xutl\ace
 */
class AceEdit extends Widget
{
    /**
     * @var string the input name. This must be set if [[model]] and [[attribute]] are not set.
     */
    public $name;

    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var string Programming Language Mode
     */
    public $mode = 'html';
    /**
     * @var string Editor theme
     * $see Themes List
     * @link https://github.com/ajaxorg/ace/tree/master/lib/ace/theme
     */
    public $theme = 'github';

    /**
     * @var array Div options
     */
    public $containerOptions = [
        'style' => 'width: 100%; min-height: 400px'
    ];

    /**
     * {@inheritDoc}
     * @see \yii\base\Object::init()
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $editorId = $this->containerOptions['id'] = $this->options['id'];
        //编辑器活动变量
        $editorVar = 'ace_'.$editorId;
        $this->getView()->registerJs("
        var {$editorVar} = ace.edit(\"{$editorId}\");
            {$editorVar}.setTheme(\"ace/theme/{$this->theme}\");
            {$editorVar}.getSession().setMode(\"ace/mode/{$this->mode}\");
        ");

        AceEditAsset::register($this->view);
        return Html::tag('div', '', $this->containerOptions);
    }
}