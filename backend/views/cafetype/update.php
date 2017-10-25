<?php

use yii\helpers\Html;


$this->title = 'Cafe type';
$this->params['breadcrumbs'][] = ['label' => 'cafetype', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cafetype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
    ]) ?>

</div>
