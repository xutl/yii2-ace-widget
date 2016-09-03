<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\ace;

use yii\widgets\InputWidget;

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
}