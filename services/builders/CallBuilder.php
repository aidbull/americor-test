<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\Call;
use app\models\History;

class CallBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        /** @var Call $call */
        $call = $model->call;
        $answered = $call && $call->status == Call::STATUS_ANSWERED;
        $body = ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');

        $data = [
            'body' => $body,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'footerDatetime' => $model->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING,
            'content' => $call->comment ?? '',
            'bodyDatetime' => $model->ins_ts,
            'eventText' => $model->eventText ?? null,
        ];

        return new HistoryEventItem($data);
    }
}