<?php


use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main description';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create description', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $provider = new \yii\data\ArrayDataProvider([
        'allModels' => $model,
        'key' => function ($model) {
            return $model->id;
        },
        'sort' => [
            'attributes' => ['id', 'introText', 'videoURL', 'videoText', 'show']
        ]
    ]);
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'introText',
            'videoURL',
            'videoText',
            'show',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{update}{delete}'
            ]
        ]
    ])
    //echo MaindescriptionWidget::widget(['data'=>$model]);?>

</div>
