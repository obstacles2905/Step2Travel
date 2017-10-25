<?php

use yii\helpers\Html;

$this->title = 'Create tour type';
$this->params['breadcrumbs'][] = ['label' => 'Tour type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
