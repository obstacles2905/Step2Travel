<?php

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\ITourCategoryRepository;
use backend\models\TourCategory;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class ARTourCategoryRepository implements ITourCategoryRepository
{

    public function getAll()
    {
        if (!$category = TourCategory::find()->all())
        {
            throw new NotFoundException('Tour categories not found');
        }
        return $category ;
    }

    public function get($id)
    {
        $category = TourCategory::findOne($id);
        if (!$category)
        {
            throw new NotFoundException('Tour categories not found');
        }
        return $category;
    }

    public function create(TourCategory $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');
    }

    public function update(TourCategory $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(TourCategory $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$categories=TourCategory::findBySql('select tourcategory.id,tourcategory.name,tourcategory.icon from tourcategory where tourcategory.id in(select category from tour)')->all())
        {
            throw new NotFoundException('Tour category not found');
        }
        foreach ($categories as $category) {
            $this->formatData($category);
        }
        return $categories;
    }

    private function formatData(TourCategory &$tourCategory)
    {
        $tourCategory['icon'] = Yii::getAlias('@server') . $tourCategory->getImage()->getUrl('128x128');
    }
}