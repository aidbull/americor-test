<?php

namespace app\services\providers;

use app\services\builders\HistoryItemBuilder;
use yii\data\ActiveDataProvider;

class HistoryEventItemDataProvider extends ActiveDataProvider
{
    public function getModels()
    {
        $models = parent::getModels();
        $historyEventItems = [];

        foreach ($models as $historyModel) {
            $historyEventItem = HistoryItemBuilder::build($historyModel);
            $historyEventItems[] = $historyEventItem;
        }

        return $historyEventItems;
    }
}
