<?php

use app\modules\pelmen\assets\PelmenAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $content string */

PelmenAsset::register($this); // Регистрируем стили и скрипты для модуля

$this->title = 'Custom Layout';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
    <?= $content ?> <!-- содержимое представления -->
</div>
<?php $this->endBody() ?>
</body>
</html>