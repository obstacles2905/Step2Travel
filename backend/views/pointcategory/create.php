<?php

use yii\helpers\Html;




$this->title = 'Create point category';
$this->params['breadcrumbs'][] = ['label' => 'Point Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pointcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,

    ]) ?>

</div>
