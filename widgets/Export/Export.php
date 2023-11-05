<?php

namespace app\widgets\Export;

use kartik\export\ExportMenu;
use Yii;
use yii\base\Model;
use yii\base\Widget;

class Export extends ExportMenu
{
    public const EXPORT_TYPES = [
        self::FORMAT_CSV => 'CSV',
        self::FORMAT_EXCEL_X => 'Excel'
    ];

    public $exportType;

    public function init()
    {
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (empty($this->exportRequestParam)) {
            $this->exportRequestParam = 'exportFull_' . $this->options['id'];
        }

        $_POST[Yii::$app->request->methodParam] = 'POST';
        $_POST[$this->exportRequestParam] = true;
        $_POST[$this->exportTypeParam] = $this->exportType;
        $_POST[$this->colSelFlagParam] = false;

        parent::init();
    }
}