<?php

namespace app\widgets\HistoryList;

use app\models\search\HistorySearch;
use app\widgets\Export\Export;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class HistoryList extends Widget
{
    /**
     * @var ActiveDataProvider
     */
    public $dataProvider;

    public $linkExport;

    public $searchModel;

    public $eventTexts;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
         return $this->render('main', [
            'linkExport' => $this->linkExport,
            'dataProvider' => $this->dataProvider,
            'eventTexts' => $this->eventTexts,
            'searchModel' => $this->searchModel
        ]);
    }
}
