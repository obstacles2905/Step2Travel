<?php

use yii\data\ArrayDataProvider;

use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Міста';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Додати місто', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $provider = new ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'pagination' => [
            'pageSize' => 10,
        ],
        'sort' => [
            'attributes' => ['id', 'name'],
        ],
    ]);

    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            'descriptionCity',
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
                'template'=>'{update}'
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template'=>'{delete}'
            ],
        ]
    ])
    ?>


</div>
