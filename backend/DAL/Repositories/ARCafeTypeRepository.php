<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\ICafeTypeRepository;
use backend\models\CafeType;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;

class ARCafeTypeRepository implements ICafeTypeRepository
{

    public function getAll()
    {
        if (!$cafetype=CafeType::find()->all())
        {
            throw new NotFoundException('Cafe types not found');
        }
        return $cafetype;
    }

    public function get($id)
    {
        $cafetype=CafeType::findOne($id);
        if (!$cafetype)
        {
            throw new NotFoundException('Cafe type not found');
        }
        return $cafetype;
    }

    public function create(CafeType $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');

    }

    public function update(CafeType $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(CafeType $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$types=CafeType::findBySql('select cafe_type.id,cafe_type.name from cafe_type where cafe_type.id in(select id_cafetype from cafe_types)')->all())
        {
            throw new NotFoundException('Cafe type not found');
        }
        return $types;
    }
}