<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

?>

<div class="point-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'descriptionPoint')->textInput(['maxlength' => 900]) ?>
    <?= $form->field($model, 'shortDescriptionPoint')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <?php if($model->id) echo Html::img($model->image, ['alt' => 'My logo']); ?>
    <?= $form->field($model, 'panorama')->fileInput() ?>
    <?php if($model->id) echo Html::img($model->panorama, ['alt' => 'My logo']); ?>
    <?= $form->field($model, 'category')->widget(Select2::classname(), [
        'name' => 'category',
        'data' => $categories,
        'options' => [
            'placeholder' => 'Виберіть категорію...',
            'multiple' => true
        ],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton(!$model['id'] ? 'Create' : 'Update', ['class' => !$model['id'] ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
