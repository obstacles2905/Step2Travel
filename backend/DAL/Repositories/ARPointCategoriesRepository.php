<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IPointCategoriesRepository;
use backend\models\PointCategories;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;


class ARPointCategoriesRepository implements IPointCategoriesRepository
{

    public function getAll()
    {
        if (!$event = PointCategories::find()->all()) {
            throw new NotFoundException('Point categories not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = PointCategories::find()->where(['id_point' => $id])->all();
        if (!$event) {
            throw new NotFoundException('Point categories not found');
        }
        return $event;
    }

    public function create(PointCategories $item)
    {

        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(PointCategories $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(PointCategories $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }
}