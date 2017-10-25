<?php


use yii\helpers\Html;



/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cafe type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new \yii\data\ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'name']
        ]
    ]);

    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}{delete}'
            ]
        ]
    ])


    //echo CafetypeWidget::widget(['data'=>$model]);?>

</div>
