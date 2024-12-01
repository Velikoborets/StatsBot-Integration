<?php

namespace app\modules\pelmen\controllers;

use yii\web\Controller;
use Yii;
use app\modules\statistic\models\Statistic;
use app\modules\pelmen\models\RuleForm;

class RuleController extends Controller
{
    public function actionIndex()
    {
        $model = new RuleForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $query = Statistic::find();
            $query->where([$model->operator1, $model->column1, $model->value1])
                ->andWhere([$model->operator2, $model->column2, $model->value2]);

            $statistics = $query->all();

            // Отправка уведомлений в Telegram при совпадении с правилами
            if (!empty($statistics)) {
                $message = "Анализ завершен. Найдено совпадений: " . count($statistics) . "\n";
                foreach ($statistics as $stat) {
                    $message .= "{$stat->name}: {$stat->id} - {$stat->name}\n";
                    $message .= "Clicks: {$stat->clicks} | Leads: {$stat->leads} | Cost: {$stat->cost}\n";
                    $message .= "Profit: {$stat->profit} | ROI: {$stat->roi}%\n\n";
                }
                Yii::info($message, 'telegram');
            }

            return $this->render('result', ['statistics' => $statistics]);
        }

        return $this->render('index', ['model' => $model]);
    }
}