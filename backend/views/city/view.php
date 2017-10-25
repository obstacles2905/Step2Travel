<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Sightseeing */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пам\'ятки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sightseeing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'Різновид',
                'format' => 'raw',
                'value' => Html::a($category['name'], ['categorysightseeing/view', 'id' => $category['id']]),
            ],
            'shortDescription',
            'address',
            'rlongtitude',
            'rlatitude',
            'isDisplayed:boolean',
        ],
    ])
    ?>


    <div class="row">
        <div class="text-center">
            <!--<img src="" class="img-responsive img-thumbnail"  style="max-width: 70%"></img>-->
            <?php $image = $model->getImage(); ?>
            <img src="<?php echo $image->getUrl('300x'); ?>" alt="" class="img-responsive img-thumbnail"></img>

        </div>
    </div>
    <div class="row">
        <div class="text-center">
            <?php $image = $model->getImageByName('panoramic-' . $model->id); ?>
            <img src="<?php echo $image->getUrl('300x'); ?>" alt="" class="img-responsive img-thumbnail"
                 style="width: 310px"></img>
        </div>
    </div>
</div>
