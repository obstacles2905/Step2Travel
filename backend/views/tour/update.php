<?php

use yii\helpers\Html;


$this->title = 'Update tour';
$this->params['breadcrumbs'][] = ['label' => 'Tour', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tour-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $tourForm,
        'cities'=>$cities,
        'points'=>$points,
        'types'=>$types,
        'categories'=>$categories,
    ]) ?>

</div>
