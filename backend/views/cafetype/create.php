<?php

use yii\helpers\Html;




$this->title = 'Create cafe type';
$this->params['breadcrumbs'][] = ['label' => 'Cafe type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafetype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,

    ]) ?>

</div>
