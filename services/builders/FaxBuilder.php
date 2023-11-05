<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\Fax;
use app\models\History;
use Yii;
use yii\helpers\Html;

class FaxBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        /** @var Fax $fax */
        $fax = $model->fax;
        $body = $model->eventText . ' - ' .
            (isset($fax->document) ? Html::a(
                Yii::t('app', 'view document'),
                $fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            ) : '');

        $data = [
            'body' => $body,
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'bodyDatetime' => $model->ins_ts,

            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ];

        return new HistoryEventItem($data);
    }
}