<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="maindescription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'introText')->textInput(['maxlength' => 150]) ?>
    <?= $form->field($model, 'videoURL')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'videoText')->textInput(['maxlength' => 175]) ?>
    <?= $form->field($model, 'show')->checkbox()?>


    <div class="form-group">
        <?= Html::submitButton(!$model['id'] ? 'Create' : 'Update', ['class' => !$model['id'] ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
