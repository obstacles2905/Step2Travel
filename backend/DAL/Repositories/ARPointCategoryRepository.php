<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\IPointCategoryRepository;
use backend\models\PointCategory;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;


class ARPointCategoryRepository implements IPointCategoryRepository
{

    public function getAll()
    {
        if (!$event=PointCategory::find()->all())
        {
            throw new NotFoundException('Point categories not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event=PointCategory::findOne($id);
        if (!$event)
        {
            throw new NotFoundException('Point categories not found');
        }
        return $event;
    }

    public function create(PointCategory $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');

    }

    public function update(PointCategory $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(PointCategory $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$types=PointCategory::findBySql('select point_category.id,point_category.name from point_category where point_category.id in(select id_pointcategory from point_categories)')->all())
        {
            throw new NotFoundException('Point type not found');
        }
        return $types;
    }
}