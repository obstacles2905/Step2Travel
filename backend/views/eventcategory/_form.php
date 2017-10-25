<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="eventcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>


    <div class="form-group">
        <?= Html::submitButton(!$model['id'] ? 'Create' : 'Update', ['class' => !$model['id'] ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
