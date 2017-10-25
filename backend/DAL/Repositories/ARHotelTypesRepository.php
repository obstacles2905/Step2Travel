<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IHotelTypesRepository;
use backend\models\HotelTypes;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;


class ARHotelTypesRepository implements IHotelTypesRepository
{

    public function getAll()
    {
        if (!$event = HotelTypes::find()->all()) {
            throw new NotFoundException('Hotel types not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = HotelTypes::find()->where(['id_hotel' => $id])->all();
        if (!$event) {
            throw new NotFoundException('Hotel types not found');
        }
        return $event;
    }

    public function create(HotelTypes $item)
    {

        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(HotelTypes $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(HotelTypes $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }
}