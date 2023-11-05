<?php

namespace app\models\export;

use yii\base\Model;

class ExportForm extends Model
{
    public $event;
    public $exportType;

    public function rules()
    {
        return [
            [['exportType'], 'required'],
            [['event', 'exportType'], 'string'],
        ];
    }
}
