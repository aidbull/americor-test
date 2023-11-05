<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\History;
use app\models\Task;

class TaskBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        /** @var Task $call */
        $task = $model->task;
        $body = "$model->eventText: " . ($task->title ?? '');

        $data = [
            'body' => $body,
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $model->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ];

        return new HistoryEventItem($data);
    }
}