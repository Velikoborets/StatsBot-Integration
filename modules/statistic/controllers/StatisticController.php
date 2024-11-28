<?php

namespace app\modules\statistic\controllers;
use app\modules\statistic\models\Statistic;

class StatisticController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Statistic::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}