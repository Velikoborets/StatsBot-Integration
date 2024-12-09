<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pelmen\models\RuleForm */

$this->title = 'Изменить данные правила № ' . $model->index;
$this->params['breadcrumbs'][] = ['label' => 'Мои правила', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить данные правила';
?>
<div class="rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>