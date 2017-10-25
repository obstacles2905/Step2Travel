<?php

use yii\helpers\Html;

$this->title = 'Create tour category';
$this->params['breadcrumbs'][] = ['label' => 'Tour category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
