<?php

use yii\helpers\Html;




$this->title = 'Create event category';
$this->params['breadcrumbs'][] = ['label' => 'Event Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,

    ]) ?>

</div>
