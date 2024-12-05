<?php

use yii\helpers\Html;

$this->title = 'Выберите модуль для управления';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="user-index d-flex justify-content-left">
    <?= Html::a('Users', ['/users'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Roles', ['/roles'], ['class' => 'btn btn-success mx-2']) ?>
    <?= Html::a('Statistic', ['/statistic'], ['class' => 'btn btn-success mx-1']) ?>
    <?= Html::a('Pelmen', ['/pelmen'], ['class' => 'btn btn-success mx-1']) ?>

    <?php if (Yii::$app->user->isGuest): ?>
        <?= Html::a('Login', ['/login'], ['class' => 'btn btn-primary mx-2']) ?>
    <?php else: ?>
        <?= Html::a('Logout (' . Yii::$app->user->identity->username . ')', ['/logout'], ['class' => 'btn btn-danger mx-2', 'data-method' => 'post']) ?>
    <?php endif; ?>
</div>
