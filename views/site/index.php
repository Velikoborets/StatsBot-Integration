<?php

use yii\helpers\Html;

$this->title = 'Выберите чем хотите управлять!';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Users', ['/users'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Roles', ['/roles'], ['class' => 'btn btn-success']) ?>
    </p>

</div>