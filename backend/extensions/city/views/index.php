<?php

use yii\helpers\Html;

?>
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Ip</th>
        <th>Name</th>
        <th>Description city</th>
        <th>Image</th>
        <th>Panorama</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?= $item->id; ?></td>
            <td><?= $item->ip; ?></td>
            <td><?= $item->name; ?></td>
            <td><?= $item->descriptionCity; ?></td>
            <?php $image = null; $image = $item->getImageByName($item->image); ?>
            <td><?= Html::img($image->getUrl('300x175'), ['alt' => 'My logo']) ?></td>
            <?php $panorama = null; $panorama = $item->getImageByName($item->panorama); ?>
            <td><?= Html::img($panorama->getUrl('300x175'), ['alt' => 'My logo']) ?></td>
            <td>
                <td>
                    <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-edit"]), ['city/update', 'id' => $item->id]); ?>
                </td>
                <td>
                    <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]), ['city/delete', 'id' => $item->id], [
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                    ]); ?>
                </td>
            </td>
        </tr>
    <?php }; ?>
    </tbody>
</table>
