<?php

use yii\helpers\Html;


$this->title = 'Update hotel';
$this->params['breadcrumbs'][] = ['label' => 'hotel', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
        'categories'=>$categories,
    ]) ?>

</div>
