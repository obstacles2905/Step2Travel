<?php

use yii\helpers\Html;

$this->title = 'Tour category';
$this->params['breadcrumbs'][] = ['label' => 'Tour category', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tourcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
