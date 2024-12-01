<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\pelmen\models\RuleForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pelmen\models\RuleForm */

$this->title = 'Задать правила анализа';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="rule-form">

    <?php $form = ActiveForm::begin(['options'  => ['class' => 'form-inline']]); ?>

    <div class="form-group">
        <?= $form->field($model, 'column1')->dropDownList(RuleForm::getColumns(), ['class' => 'form-control'])->label(false) ?>

        <?= $form->field($model, 'operator1')->dropDownList(RuleForm::getOperators(), ['class' => 'form-control mx-4'])->label(false) ?>

        <?= $form->field($model, 'value1')->textInput(['class' => 'form-control'])->label(false) ?>

        <?= $form->field($model, 'column2')->dropDownList(RuleForm::getColumns(), ['class' => 'form-control mx-4'])->label(false) ?>

       <?= $form->field($model, 'operator2')->dropDownList(RuleForm::getOperators(), ['class' => 'form-control'])->label(false) ?>

        <?= $form->field($model, 'value2')->textInput(['class' => 'form-control mx-4'])->label(false) ?>

        <?= Html::submitButton('Анализировать', ['class' => 'btn btn-danger btn-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>