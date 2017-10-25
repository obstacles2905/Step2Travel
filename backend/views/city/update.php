<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sightseeing */

$this->title = 'Редагувати пам\'ятку: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пам\'ятки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="sightseeing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
