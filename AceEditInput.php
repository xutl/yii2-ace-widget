<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\ace;

use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Class AceEdit
 * @package xutl\ace
 */
class AceEdit extends InputWidget
{
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
        Html::addCssStyle($this->options, 'display: none');
        $editorId = $this->getId();
        $editorVar = 'ace_'.$editorId;
        $textAreaVar = 'aceTextArea_'.$editorId;
        $this->containerOptions['id'] = $editorId;

        $this->getView()->registerJs("var {$editorVar} = ace.edit(\"{$editorId}\");{$editorVar}.setTheme(\"ace/theme/{$this->theme}\");{$editorVar}.getSession().setMode(\"ace/mode/{$this->mode}\")");
        $this->getView()->registerJs("var {$textAreaVar} = $('#{$this->options['id']}').hide();{$editorVar}.getSession().setValue({$textAreaVar}.val());{$editorVar}.getSession().on('change', function(){{$textAreaVar}.val({$editorVar}.getSession().getValue());});");
        $this->getView()->registerCss("#{$editorId}{position:relative}");
        AceEditAsset::register($this->view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $content = Html::tag('div', '', $this->containerOptions);
        if ($this->hasModel()) {
            $content .= Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $content .= Html::textarea($this->name, $this->value, $this->options);
        }
        return $content;
    }
}