<?php

use yii\helpers\Html;


$this->title = 'Hotel type';
$this->params['breadcrumbs'][] = ['label' => 'hoteltype', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hoteltype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
    ]) ?>

</div>
