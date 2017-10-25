<?php

use yii\helpers\Html;




$this->title = 'Create cafe';
$this->params['breadcrumbs'][] = ['label' => 'Cafe', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
        'categories'=>$categories,

    ]) ?>

</div>
