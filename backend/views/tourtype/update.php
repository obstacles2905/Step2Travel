<?php

use yii\helpers\Html;

$this->title = 'Tour type';
$this->params['breadcrumbs'][] = ['label' => 'Tour type', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tourtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
