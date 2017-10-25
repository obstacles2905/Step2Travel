<?php


use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cafe';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create cafe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new \yii\data\ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'name', 'descriptionCafe', 'rate', 'latitude', 'longtitude', 'image']
        ]
    ]);
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            'descriptionCafe',
            'rate',
            'latitude',
            'longtitude',
            ['attribute' => 'image',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img($data->getImage()->getUrl('300x175'), ['alt' => 'My logo']);
                },

            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template'=>'{update}'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template'=>'{delete}'
            ],
        ]
    ])


    //echo CafeWidget::widget(['data' => $model]); ?>

</div>
