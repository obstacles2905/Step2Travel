<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="tourtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>

    <?php if($model->id) echo Html::img($model->icon, ['alt' => 'My logo']); ?>

    <?= $form->field($model, 'icon')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(!$model['id'] ? 'Create' : 'Update', ['class' => !$model['id'] ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
