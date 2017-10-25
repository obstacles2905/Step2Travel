<?php

use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tour category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create tour category', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['attribute' => 'icon',
                'format' => 'raw',
                'value' => function ($data) {
                    $image = $data->getImage();
                    return Html::img($image->getUrl('300x175'), ['alt' => 'My logo']);
                },

            ],
            ['class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}{delete}'
            ]
        ]
    ]);
    //echo TourCategoryWidget::widget(['data'=>$model]);?>
</div>
