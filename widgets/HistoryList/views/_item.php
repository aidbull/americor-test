<?php

use app\dto\HistoryEventItem;
use yii\helpers\Html;

/* @var $model HistoryEventItem */

?>

<?php echo Html::tag('i', '', ['class' => "icon icon-circle icon-main white"]); ?>
<table class="table">
    <tr>
        <td class="bg-danger col-xs-2 text-center">
            <strong>
                <?= $model->eventName ?>
            </strong>
        </td>
        <td ><?= $this->render($model->template, $model->toArray()) ?></td>
    </tr>
</table>
