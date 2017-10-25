<?php

use backend\models\TourForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tour */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Екскурсії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Видалити', ['delete', 'id' => $model->id], [
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
            [
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '№',
                'value' => function ($data) {
                    return $data->id;
                },
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'label' => 'Назва',
                'value' => function ($data) {
                    return $data->name;
                },
            ],
            [
                'attribute' => 'city',
                'format' => 'raw',
                'label' => 'Мiсто',
                'value' => function ($data) {
                    return $data->city->name;
                },
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'label' => 'Тип',
                'value' => function ($data) {
                    return $data->type->name;
                },
            ],
            [
                'attribute' => 'category',
                'format' => 'raw',
                'label' => 'Категорiя',
                'value' => function ($data) {
                    return $data->category->name;
                },
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'label' => 'Рейтинг',
                'value' => function ($data) {
                    return $data->rate;
                },
            ],
        ],
    ]);
    ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Назва пам'ятки</th>
                <th>Категорiя</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <ul class="list-group">
                        <?php foreach ($model->points as $point) { ?>
                            <li class="list-group-item"> <?= Html::a($point->name, ['point/view', 'id' => $point->id]) ?> </li>
                        <?php } ?>
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        <?php foreach ($model->points as $point) { ?>
                            <li class="list-group-item"> <?=$point->category->name?> </li>
                        <?php } ?>
                    </ul>
                </td>
            <tr>
                <td colspan="4"> <b>Опис екскурсії</b> <br> <br><?php echo $model->description ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row" >
        <div class="text-center">
            <p><b>Зображення</b></p>
            <img src="<?php echo $model->getImage()->getUrl('1280x'); ?>" alt="Ошибка загрузки изображения"
                 class="img-responsive img-thumbnail" style="max-width: 70%"/>
        </div>
    </div>
    <div class="row" >
        <div class="text-center">
            <?php if ($model->tour3d): ?>
                <br><p><b>3Д тур</b></p>                <iframe src='<?=$model->tour3d?>' scrolling="no" style="width: 100%; height: 400px;">
<!--            --><?php //else: ?>
<!--                <br><p><b>3Д тур не добавлен</b></p>-->
            <?php endif; ?>
        </div>
    </div>
</div>