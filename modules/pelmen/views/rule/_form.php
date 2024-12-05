<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pelmen\models\RuleForm */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="rule-form d-flex align-items-center">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'w-100']]); ?>

    <div class="d-flex flex-wrap w-100">
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'column1')->dropDownList($model::getColumns(), ['prompt' => 'Select Column'])->label(false) ?>
        </div>
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'operator1')->dropDownList($model::getOperators(), ['prompt' => 'Select Operator'])->label(false) ?>
        </div>
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'value1')->textInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'column2')->dropDownList($model::getColumns(), ['prompt' => 'Select Column'])->label(false) ?>
        </div>
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'operator2')->dropDownList($model::getOperators(), ['prompt' => 'Select Operator'])->label(false) ?>
        </div>
        <div class="p-2 col-md-2">
            <?= $form->field($model, 'value2')->textInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="p-2">
            <?= Html::submitButton('Сохранить правило', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>