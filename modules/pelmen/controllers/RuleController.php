<?php

namespace app\modules\pelmen\controllers;

use Yii;
use yii\web\Controller;
use app\modules\user\models\User;
use yii\web\NotFoundHttpException;
use app\modules\pelmen\models\Rule;
use app\modules\pelmen\models\RuleForm;
use app\modules\statistic\models\Statistic;

class RuleController extends Controller
{
    public function actionIndex()
    {
        $model = new RuleForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $statistics = $this->analyzeAndSend($model);
            return $this->render('result', ['statistics' => $statistics]);
        }

        $rules = Rule::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('index', ['model' => $model, 'rules' => $rules]);
    }

    public function actionCreate()
    {
        $model = new RuleForm();

        if ($model->load(Yii::$app->request->post())) {
            
            if ($model->validate()) {
                $rule = new Rule();
                $rule->attributes = $model->attributes;
                $rule->user_id = Yii::$app->user->id;

                if ($rule->save()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id !== Yii::$app->user->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new RuleForm();
        $model->attributes = $rule->attributes;
        $model->id = $rule->id;

        $model->index = $rule->getIndex();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $rule->attributes = $model->attributes;
            if ($rule->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id === Yii::$app->user->id) {
            $rule->delete();
        }

        return $this->redirect(['index']);
    }

    public function actionLinkTg($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id !== Yii::$app->user->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $statistics = $this->analyzeAndSend($rule);
        $success = !empty($statistics);

        if ($success) {
            Yii::$app->session->setFlash('success', 'Сообщение отправлено в Telegram.');
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось отправить сообщение в Telegram. Нет совпадний по заданным правилам');
        }

        return $this->redirect(['index']);
    }


    public function actionResult($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id !== Yii::$app->user->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $query = Statistic::find();
        $query->where([$rule->operator1, $rule->column1, $rule->value1])
            ->andWhere([$rule->operator2, $rule->column2, $rule->value2]);

        $statistics = $query->all();

        return $this->render('result', [
            'statistics' => $statistics,
        ]);
    }

    protected function analyzeAndSend($rule)
    {
        $query = Statistic::find();
        $query->where([$rule->operator1, $rule->column1, $rule->value1])
            ->andWhere([$rule->operator2, $rule->column2, $rule->value2]);

        $statistics = $query->all();

        if (!empty($statistics)) {
                $message = "Анализ завершен. Найдено совпадений: " . count($statistics) . "\n";

                foreach ($statistics as $stat) {
                    $message .= "{$stat->name}: {$stat->id} - {$stat->name}\n";
                    $message .= "Clicks: {$stat->clicks} | Leads: {$stat->leads} | Cost: {$stat->cost}\n";
                    $message .= "Profit: {$stat->profit} | ROI: {$stat->roi}%\n\n";
                }

                Yii::info($message, 'local');
                Yii::info($message, 'telegram');
            }

        return $statistics;
    }

    protected function findModel($id)
    {
        if (($model = Rule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}