<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'descriptionCity') ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?php if($model->id) echo Html::img($model->image, ['alt' => 'My logo']); ?>

    <?= $form->field($model, 'panorama')->fileInput() ?>

    <?php if($model->id) Html::img($model->panorama, ['alt' => 'My logo']); ?>

    <div id="map" style="height: 80px;width: 800px;"></div>

    <div class="form-group">
        <?= Html::submitButton($model->id == null ? 'Створити' : 'Зберегти зміни', ['class' => $model->id == null ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
