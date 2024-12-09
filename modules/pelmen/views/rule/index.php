<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $rules app\modules\pelmen\models\Rule[] */

$this->title = 'Мои правила';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новое правило', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => \app\modules\pelmen\models\Rule::find()->where(['user_id' => Yii::$app->user->id]),
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'column1',
            'operator1',
            'value1',
            'column2',
            'operator2',
            'value2',
            [
                'header' => '<div style="text-align: center;">Действия</div>',
                'class' => ActionColumn::className(),
                'template' => '{linkTG} &nbsp {result} &nbsp {update} &nbsp {delete}',
                'buttons' => [
                    'result' => function ($url, $model, $key) {
                        return Html::a('Результат анализа', ['result', 'id' => $model->id], ['class' => 'btn btn-success']);
                    },
                    'linkTG' => function ($url, $model, $key) {
                        return Html::a('Отправить в tg', ['link-tg', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Удалить', ['delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger',
                            'data-method' => 'post',
                            'onclick' =>
                                'if (confirm("Are you sure you want to delete this item?")) {
                                    return true;
                                } else {
                                    return false;
                                }',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Редактировать', ['update', 'id' => $model->id],
                        [
                            'class' => 'btn btn-success',
                            'data-method' => 'post',
                        ]);
                    },
                ],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
        ],
    ]); ?>
    <p>
        * Результаты анализа созданных правил автоматически отправляются в твой
        <i>Telegram каждые 45 минут.</i><br>
        * <b>Отправить в tg</b> - отправляет результат в telegram мгновенно.<br>
        * <b>Результат анализа</b> -  показывает результат прямо в Lostools в виде таблицы.
    </p>
</div>
