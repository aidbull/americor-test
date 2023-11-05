<?php

use app\models\History;
use app\widgets\HistoryList\HistoryList;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $exportForm Model */
/** @var $exportTypes String[] */
/** @var $eventTexts String[] */
/** @var $searchModel History */
/** @var $dataProvider ActiveDataProvider */

$this->title = 'Americor Test';

$exportTypes = \app\widgets\Export\Export::EXPORT_TYPES;
?>

<div class="site-index">
    <div class="panel panel-primary">
        <div class="panel-body media-middle">
            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['site/export']]); ?>
            <div class="col-sm-5 bg-info">
                <?= $form->field($exportForm, 'event')->dropDownList($eventTexts, ['prompt' => 'Select Event Type']) ?>
                <?= $form->field($exportForm, 'exportType')->dropDownList($exportTypes, ['prompt' => 'Select Export Type']) ?>
                <?= Html::submitButton('Export', ['class' => 'btn btn-success']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?= HistoryList::widget(['dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'eventTexts' => $eventTexts]) ?>
</div>