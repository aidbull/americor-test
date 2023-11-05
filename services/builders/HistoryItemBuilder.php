<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\History;
use Yii;

class HistoryItemBuilder
{
    protected const BUILDER_CONFIG = [
        History::EVENT_CREATED_TASK => ['builder' => TaskBuilder::class, 'template' => '_item_common'],
        History::EVENT_COMPLETED_TASK => ['builder' => TaskBuilder::class, 'template' => '_item_common'],
        History::EVENT_UPDATED_TASK => ['builder' => TaskBuilder::class, 'template' => '_item_common'],

        History::EVENT_INCOMING_SMS => ['builder' => SmsBuilder::class, 'template' => '_item_common'],
        History::EVENT_OUTGOING_SMS => ['builder' => SmsBuilder::class, 'template' => '_item_common'],

        History::EVENT_OUTGOING_FAX => ['builder' => FaxBuilder::class, 'template' => '_item_common'],
        History::EVENT_INCOMING_FAX => ['builder' => FaxBuilder::class, 'template' => '_item_common'],

        History::EVENT_INCOMING_CALL => ['builder' => CallBuilder::class, 'template' => '_item_common'],
        History::EVENT_OUTGOING_CALL => ['builder' => CallBuilder::class, 'template' => '_item_common'],

        History::EVENT_CUSTOMER_CHANGE_TYPE => ['builder' => CustomerChangeTypeBuilder::class, 'template' => '_item_statuses_change'],
        History::EVENT_CUSTOMER_CHANGE_QUALITY => ['builder' => CustomerChangeQualityBuilder::class, 'template' => '_item_statuses_change'],
    ];

    protected const DEFAULT_CONFIG = ['builder' => DefaultBuilder::class, 'template' => '_item_common'];

    /**
     * @param History $model
     * @return mixed
     */
    public static function build(History $model)
    {
        $eventType = $model->event;

        $builderSettings = isset(self::BUILDER_CONFIG[$eventType]) ? self::BUILDER_CONFIG[$eventType] : self::DEFAULT_CONFIG;

        $builderClass = $builderSettings['builder'];
        $templateName = $builderSettings['template'];

        $historyEventItem = $builderClass::build($model);
        $historyEventItem->template = $templateName;
        $historyEventItem->eventName = $model->getEventTextByEvent($eventType);
        $historyEventItem->user = $model->user ? $model->user->username :  Yii::t('app', 'System');
        $historyEventItem->object = $model->object;

        return $historyEventItem;
    }
}
