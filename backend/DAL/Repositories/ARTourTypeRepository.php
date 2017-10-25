<?php

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\ITourTypeRepository;
use backend\models\TourType;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;


class ARTourTypeRepository implements ITourTypeRepository
{

    public function getAll()
    {
        if (!$type = TourType::find()->all())
        {
            throw new NotFoundException('Tour types not found');
        }
        return $type ;
    }

    public function get($id)
    {
        $type = TourType::findOne($id);
        if (!$type)
        {
            throw new NotFoundException('Tour types not found');
        }
        return $type;
    }

    public function create(TourType $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');

    }

    public function update(TourType $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(TourType $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$types=TourType::findBySql('select tourtype.id,tourtype.name,tourtype.image from tourtype where tourtype.id in(select tour.type from tour)')->all())
        {
            throw new NotFoundException('Tour type not found');
        }
        foreach ($types as $type) {
            $this->formatData($type);
        }
        return $types;
    }

    private function formatData(TourType &$tourType)
    {
        $tourType['image'] = Yii::getAlias('@server') . $tourType->getImage()->getUrl('128x128');
    }
}