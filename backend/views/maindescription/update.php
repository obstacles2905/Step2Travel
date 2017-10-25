<?php

use yii\helpers\Html;


$this->title = 'Update Description';
$this->params['breadcrumbs'][] = ['label' => 'description', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindescription-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,
    ]) ?>

</div>
