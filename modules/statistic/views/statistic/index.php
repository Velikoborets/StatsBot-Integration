<?php

use app\modules\statistic\models\Statistic;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data table';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'clicks',
            'leads',
            'cost',
            'profit',
            'roi',
            'date',
        ],
    ]); ?>
</div>
