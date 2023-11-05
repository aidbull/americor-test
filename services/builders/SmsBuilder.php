<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\History;
use app\models\Sms;
use Yii;

class SmsBuilder implements HistoryItemBuilderInterface
{
    /**
     * @param History $model
     * @return HistoryEventItem
     */
    public static function build(History $model): HistoryEventItem
    {
        /** @var Sms $sms */
        $sms = $model->sms;
        $body = $sms->message ? $sms->message : '';

        $data = [
            'body' => $body,
            'footer' => $sms->direction == Sms::DIRECTION_INCOMING ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $sms->phone_to ?? ''
                ]),
            'iconIncome' => $sms->direction == Sms::DIRECTION_INCOMING,
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ];

        return new HistoryEventItem($data);
    }
}