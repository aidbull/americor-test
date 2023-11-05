<?php

namespace app\controllers;

use app\models\export\ExportForm;
use app\models\History;
use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    private $dataProvider;

    private $model;

    public function __construct($id,
                                $module,
                                $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id === 'index') {
            $this->prepareHistoryDataProvider();
        }

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index',
            [
                'dataProvider' => $this->dataProvider,
                'searchModel' => $this->model,
                'eventTexts' => History::getEventTexts(),
                'exportForm' => new ExportForm()
            ]);
    }

    public function actionExport()
    {
        $exportModel = new ExportForm();
        if ($exportModel->load(Yii::$app->request->get()) && $exportModel->validate()) {
            $model = new HistorySearch();

            $dataProvider = $model->search(
                [
                    'event' => $exportModel->event,
                ]
            );

            return $this->render('export', [
                'dataProvider' => $dataProvider,
                'exportType' => $exportModel->exportType,
                'batchSize' => 100,
                'filename' => 'history-' . time(),
                'model' => $model
            ]);
        }
    }

    private function prepareHistoryDataProvider($params = null)
    {
        $model = new HistorySearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        $this->dataProvider = $dataProvider;
        $this->model = $model;
    }
}
