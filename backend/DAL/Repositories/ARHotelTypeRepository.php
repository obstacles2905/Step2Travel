<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IHotelTypeRepository;
use backend\models\HotelType;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;

class ARHotelTypeRepository implements IHotelTypeRepository
{

    public function getAll()
    {
        if (!$cafetype=HotelType::find()->all())
        {
            throw new NotFoundException('Hotel types not found');
        }
        return $cafetype;
    }

    public function get($id)
    {
        $cafetype=HotelType::findOne($id);
        if (!$cafetype)
        {
            throw new NotFoundException('Hotel type not found');
        }
        return $cafetype;
    }

    public function create(HotelType $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');

    }

    public function update(HotelType $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(HotelType $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$types=HotelType::findBySql('select hotel_type.id,hotel_type.name from hotel_type where hotel_type.id in(select id_hoteltype from hotel_types)')->all())
        {
            throw new NotFoundException('Hotel type not found');
        }
        return $types;
    }
}