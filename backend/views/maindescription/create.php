<?php

use yii\helpers\Html;




$this->title = 'Create main description';
$this->params['breadcrumbs'][] = ['label' => 'Main description', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindescription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form_main,

    ]) ?>

</div>
