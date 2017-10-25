<?php

use yii\helpers\Html;




$this->title = 'Create hotel type';
$this->params['breadcrumbs'][] = ['label' => 'Hotel type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoteltype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,

    ]) ?>

</div>
