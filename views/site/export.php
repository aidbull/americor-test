<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\search\HistorySearch
 * @var $dataProvider \app\services\providers\HistoryEventItemDataProvider
 * @var $exportType string
 * @var $filename string
 * @var $batchSize integer
 */

use app\dto\HistoryEventItem;
use app\widgets\Export\Export;

?>

<?= Export::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'user:ntext:User',
        'bodyDatetime:datetime:Date',
        'object:ntext:Type',
        'eventName:ntext:Event Type',
        [
            'label' => Yii::t('app', 'Message'),
            'value' => function (HistoryEventItem $model) {
                return strip_tags($model->body);
            }
        ]
    ],
    'exportType' => $exportType,
    'batchSize' => $batchSize,
    'filename' => $filename,
    'showConfirmAlert' => false,
]);