<?php

use yii\helpers\Html;


$this->title = 'Update point';
$this->params['breadcrumbs'][] = ['label' => 'point', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
        'categories'=>$categories,
    ]) ?>

</div>
