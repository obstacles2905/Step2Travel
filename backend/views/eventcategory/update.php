<?php

use yii\helpers\Html;


$this->title = 'Event category';
$this->params['breadcrumbs'][] = ['label' => 'event', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
    ]) ?>

</div>
