<?php
/* @var $dataProvider yii\data\ActiveDataProvider */

use backend\models\TourForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

$this->title = 'Екскурсії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Створити екскурсію', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'name', 'city', 'type', 'category', 'description', 'rate']
        ],
        'modelClass' => TourForm::className(),
    ]);
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'city',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->city->name;
                },
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->type->name;
                },
            ],
            [
                'attribute' => 'category',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->category->name;
                },
            ],
            'description',
            'rate',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($data) {
                    $image = $data->getImage();
                    return Html::img($image->getUrl('300x175'), ['alt' => 'My logo']);
                },
            ],
            ['class' => \yii\grid\ActionColumn::className(),
                'template' => '{view}'
            ],
            ['class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}'
            ],
            ['class' => \yii\grid\ActionColumn::className(),
                'template' => '{delete}'
            ],
        ]
    ]);
    //echo TourWidget::widget(['data'=>$model]);?>

</div>
