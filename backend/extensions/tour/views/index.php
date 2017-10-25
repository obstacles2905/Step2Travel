<?php

use yii\helpers\Html;
?>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>City</th>
        <th>Type</th>
        <th>Category</th>
        <th>Description</th>
        <th>Image</th>
        <th>Rate</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?= $item->id; ?></td>
            <td><?= $item->name; ?></td>
            <td><?php $city = new \backend\BLL\Services\CityService($cityRepo = new \backend\DAL\Repositories\ARCityRepository()); echo $city->get($item->city)->getName(); ?></td>
            <td><?php $type = new \backend\BLL\Services\TourTypeService($typeRepo = new \backend\DAL\Repositories\ARTourTypeRepository()); echo $type->get($item->type)->getName(); ?></td>
            <td><?php $category = new \backend\BLL\Services\TourCategoryService($categoryRepo = new \backend\DAL\Repositories\ARTourCategoryRepository()); echo $category->get($item->category)->getName(); ?></td>
            <td><?= $item->description; ?></td
            <td></td>
            <?php $image = null; $image = $item->getImage(); ?>
            <td><?= Html::img($image->getUrl('300x175'), ['alt' => 'My logo']) ?></td>
            <td><?= $item->rate; ?></td>
            <td>
                <td>
                    <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-edit"]), ['tour/update', 'id' => $item->id]); ?>
                </td>
                <td>
                    <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]), ['tour/delete', 'id' => $item->id], [
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                    ]); ?>
                </td>
            </td>
        </tr>
    <?php }; ?>
    </tbody>
</table>
