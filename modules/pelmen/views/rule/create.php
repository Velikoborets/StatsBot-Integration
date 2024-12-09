<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pelmen\models\RuleForm */

$this->title = 'Создай своё правило';
$this->params['breadcrumbs'][] = ['label' => 'Мои правила', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>