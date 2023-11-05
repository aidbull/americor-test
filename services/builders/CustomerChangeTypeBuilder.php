<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\Customer;
use app\models\History;

class CustomerChangeTypeBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        $body = "$model->eventText " .
            (Customer::getTypeTextByType($model->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($model->getDetailNewValue('type')) ?? "not set");

        $data = [
            'body' => $body,
            'bodyDatetime' => $model->ins_ts,
            'oldValue' => Customer::getTypeTextByType($model->getDetailOldValue('type')),
            'newValue' => Customer::getTypeTextByType($model->getDetailNewValue('type'))
        ];

        return new HistoryEventItem($data);
    }
}