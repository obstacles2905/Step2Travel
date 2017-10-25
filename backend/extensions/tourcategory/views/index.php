<?php

use yii\helpers\Html;
?>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Icon</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?= $item->id; ?></td>
            <td><?= $item->name; ?></td>
            <?php $image = null; $image = $item->getImage(); ?>
            <td><?= Html::img($image->getUrl('300x175'), ['alt' => 'My logo']) ?></td>
            <td>
            <td>
                <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-edit"]), ['tourcategory/update', 'id' => $item->id]); ?>
            </td>
            <td>
                <?php echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]), ['tourcategory/delete', 'id' => $item->id], [
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                ]); ?>
            </td>
            </td>
        </tr>
    <?php }; ?>
    </tbody>
</table>
