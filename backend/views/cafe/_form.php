<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

?>

<div class="cafe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
    <?= $form->field($model, 'descriptionCafe')->textarea(['maxlength' => 900]) ?>
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => 12]) ?>
    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => 12]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <?php if($model->id) echo Html::img($model->image, ['alt' => 'My logo']); ?>
    <?= $form->field($model, 'tour3d')->fileInput() ?>
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
