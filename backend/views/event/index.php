<?php


use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new \yii\data\ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'name', 'descriptionEvent', 'date', 'begin', 'end', 'city', 'latitude', 'longtitude', 'image', 'category']
        ]
    ]);

    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            'descriptionEvent',
            'date',
            'begin',
            'end',
            'city',
            'latitude',
            'longtitude',
            ['attribute' => 'image',
                'format' => 'raw',
                'value' => function ($data) {
                    $image = $data->getImage();
                    return Html::img($image->getUrl('300x175'), ['alt' => 'My logo']);
                },
            ],
            'category',
            ['class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}{delete}'
            ]
        ]
    ]);


    //echo EventWidget::widget(['data'=>$model]);?>

</div>
