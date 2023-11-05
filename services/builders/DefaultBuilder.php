<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\History;

class DefaultBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        $data = [
            'body' => $model->eventText,
            'iconClass' => 'fa-gear bg-purple-light',
            'bodyDatetime' => $model->ins_ts,
        ];

        return new HistoryEventItem($data);
    }
}