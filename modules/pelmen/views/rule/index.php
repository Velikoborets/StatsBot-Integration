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
                        return Html::a('Результат анализа', ['result', 'id' => $model->id], ['class' => 'btn  btn-danger']);
                    },
                    'linkTG' => function ($url, $model, $key) {
                        return Html::a('Отправить в tg', ['link-tg', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    },
                ],
                'contentOptions' => ['style' => 'text-align: center;'],
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    if ($action === 'result') {
                        return Url::toRoute(['result', 'id' => $model->id]);
                    }
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>
    <p>
        * Результаты анализа созданных правил автоматически отправляются в твой <i>Telegram каждые 45 минут.</i><br>
        * <b>Отправить в tg</b> - отправляет результат в telegram мнговенно.<br>
        * <b>Результат анализа</b> -  показывает результат прямо в Lostools в виде таблицы.
    </p>
</div>
