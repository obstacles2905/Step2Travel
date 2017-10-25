<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SightseeingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sightseeing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'shortDescription') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'rlongtitude') ?>

    <?= $form->field($model, 'rlatitude') ?>

    <?= $form->field($model, 'isDisplayed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
