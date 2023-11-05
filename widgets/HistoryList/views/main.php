<?php

use app\services\data\HistoryEventItemDataProvider;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider HistoryEventItemDataProvider */
/* @var $searchModel ActiveDataProvider */
/* @var $eventTexts String[] */

?>

<?php Pjax::begin(['id' => 'grid-pjax', 'formSelector' => false]); ?>

<div class="panel panel-primary panel-small m-b-0">
    <div class="panel-body panel-body-selected">
        <?php $form = ActiveForm::begin(['method' => 'get', 'options' => ['data-pjax' => true]]); ?>
        <div class="pull-sm-right">
            <?= $form->field($searchModel, 'event')
                ->dropDownList($eventTexts, ['prompt' => 'Select Event Type', 'name' => 'event'])
                ->label(false); ?>
            <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'options' => [
        'tag' => 'ul',
        'class' => 'list-group'
    ],
    'itemOptions' => [
        'tag' => 'li',
        'class' => 'list-group-item'
    ],
    'emptyTextOptions' => ['class' => 'empty p-20'],
    'layout' => '{items}{pager}',
]); ?>

<?php Pjax::end(); ?>
