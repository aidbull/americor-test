<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\Customer;
use app\models\History;

class CustomerChangeQualityBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        $body = "$model->eventText " .
            (Customer::getQualityTextByQuality($model->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($model->getDetailNewValue('quality')) ?? "not set");

        $data = [
            'body' => $body,
            'bodyDatetime' => $model->ins_ts,
            'oldValue' => Customer::getQualityTextByQuality($model->getDetailOldValue('quality')),
            'newValue' => Customer::getQualityTextByQuality($model->getDetailNewValue('quality')),
        ];

        return new HistoryEventItem($data);
    }
}