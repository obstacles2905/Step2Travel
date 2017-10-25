<?php


use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create point', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new \yii\data\ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'name', 'descriptionPoint', 'shortDescriptionPoint', 'rate', 'latitude', 'longtitude']
        ]
    ]);
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            'descriptionPoint',
            'shortDescriptionPoint',
            'rate',
            'latitude',
            'longtitude',
            ['attribute' => 'image',
                'format' => 'raw',
                'value' => function ($data) {
                    $image = $data->getImageByName($data->image);
                    return Html::img($image->getUrl('300x175'), ['alt' => 'My logo']);
                },

            ],
            ['attribute' => 'panorama',
                'format' => 'raw',
                'value' => function ($data) {
                    $panorama = $data->getImageByName($data->panorama);
                    return Html::img($panorama->getUrl('300x175'), ['alt' => 'My logo']);
                },

            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{delete}'
            ]
        ]
    ])


    ///echo PointWidget::widget(['data' => $model]); ?>

</div>
