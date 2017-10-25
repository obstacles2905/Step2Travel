<?php

use yii\helpers\Html;




$this->title = 'Create hotel';
$this->params['breadcrumbs'][] = ['label' => 'Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
        'categories'=>$categories,

    ]) ?>

</div>
