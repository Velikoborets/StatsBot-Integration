<?php

namespace app\modules\pelmen\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\modules\pelmen\models\Rule;
use app\modules\pelmen\models\RuleForm;
use app\modules\statistic\models\Statistic;

class RuleController extends Controller
{
    // Получает все правила, созданные текущим пользователем, и отображает их.
    // Выполняет анализ таблицы Statistic на основе правил, введенных пользователем,
    // и отправляет сообщения в Telegram при совпадении с правилами.
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
                $user = Yii::$app->user->identity;
                $telegramNickname = $user->telegram_nickname;

                $message = "Анализ завершен. Найдено совпадений: " . count($statistics) . "\n";
                foreach ($statistics as $stat) {
                    $message .= "{$stat->name}: {$stat->id} - {$stat->name}\n";
                    $message .= "Clicks: {$stat->clicks} | Leads: {$stat->leads} | Cost: {$stat->cost}\n";
                    $message .= "Profit: {$stat->profit} | ROI: {$stat->roi}%\n\n";
                }

                // Отправка сообщения конкретному пользователю
                Yii::info([$telegramNickname, $message], 'telegram');
                Yii::info($message, 'local');
            }

            return $this->render('result', ['statistics' => $statistics]);
        }

        // Получение всех правил, созданных текущим пользователем
        $rules = Rule::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('index', ['model' => $model, 'rules' => $rules]);
    }


    // Создает новое правило.
    // Если данные формы валидны и правило успешно сохраняется, происходит редирект на страницу index.
    public function actionCreate()
    {
        $model = new RuleForm();

        if ($model->load(Yii::$app->request->post())) {
            Yii::info($model->attributes, 'local');

            if ($model->validate()) {
                Yii::info('Validation passed', 'local');

                $rule = new Rule();
                $rule->attributes = $model->attributes;
                $rule->user_id = Yii::$app->user->id;

                // Логирование атрибутов модели перед сохранением
                Yii::info('Rule attributes before saving: ' . json_encode($rule->attributes), 'local');

                // Логирование отдельно каждого атрибута
                Yii::info('user_id: ' . $rule->user_id, 'local');
                Yii::info('column1: ' . $rule->column1, 'local');
                Yii::info('operator1: ' . $rule->operator1, 'local');
                Yii::info('value1: ' . $rule->value1, 'local');
                Yii::info('column2: ' . $rule->column2, 'local');
                Yii::info('operator2: ' . $rule->operator2, 'local');
                Yii::info('value2: ' . $rule->value2, 'local');

                if ($rule->save()) {
                    Yii::info('Rule saved successfully', 'local');
                    return $this->redirect(['index']);
                } else {
                    Yii::info('Failed to save rule', 'local');
                    Yii::info('Errors: ' . json_encode($rule->errors), 'local');
                }
            } else {
                Yii::info('Validation failed', 'local');
                Yii::info('Errors: ' . json_encode($model->errors), 'local');
            }
        } else {
            Yii::info('Failed to load data', 'local');
        }

        return $this->render('create', ['model' => $model]);
    }

    // Обновляет существующее правило.
    // Проверяет, что правило принадлежит текущему пользователю, прежде чем разрешить его обновление.
    public function actionUpdate($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id !== Yii::$app->user->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new RuleForm();
        $model->attributes = $rule->attributes;

        // Добавление id в модель
        $model->id = $rule->id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $rule->attributes = $model->attributes;
            if ($rule->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['model' => $model]);
    }



    // Удаляет существующее правило.
    // Проверяет, что правило принадлежит текущему пользователю, прежде чем разрешить его удаление.
    public function actionDelete($id)
    {
        $rule = $this->findModel($id);

        if ($rule->user_id === Yii::$app->user->id) {
            $rule->delete();
        }

        return $this->redirect(['index']);
    }

    public function actionResult($id): string
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


    // Ищет модель Rule по её первичному ключу. Если модель не найдена, бросает исключение NotFoundHttpException.
    protected function findModel($id)
    {
        if (($model = Rule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}