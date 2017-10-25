<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'descriptionEvent')->textInput(['maxlength' => 900]) ?>
    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'date',
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-m-d'

        ]
    ]);//$form->field($model, 'date')->textInput()    ?>
    <?= $form->field($model, 'city')->dropDownList($cities) ?>
    <?= TimePicker::widget([
        'model' => $model,
        'attribute' => 'begin',
        'pluginOptions' => [
            'minuteStep'=>1,
            'showMeridian'=>false
        ]
    ]);
    //$form->field($model, 'begin')->textInput(['maxlength' => 40])   ?>
    <?= TimePicker::widget([
        'model' => $model,
        'attribute' => 'end',
        'pluginOptions' => [
            'autoclose' => true,
            'minuteStep'=>1,
            'showMeridian'=>false
        ]
    ]);
    //$form->field($model, 'end')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <?php if($model->id) echo Html::img($model->image, ['alt' => 'My logo']); ?>
    <?= $form->field($model, 'category')->dropDownList($categories); ?>
    <div class="form-group">
        <?= Html::submitButton(!$model['id'] ? 'Create' : 'Update', ['class' => !$model['id'] ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
