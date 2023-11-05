<?php

namespace app\services\builders;

use app\dto\HistoryEventItem;
use app\models\History;

interface HistoryItemBuilderInterface
{
    public static function build(History $model): HistoryEventItem;
}
