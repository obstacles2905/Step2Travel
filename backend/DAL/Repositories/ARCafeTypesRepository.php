<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;

use backend\models\CafeTypes;
use backend\DAL\Interfaces\ICafeTypesRepository;

use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;


class ARCafeTypesRepository implements ICafeTypesRepository
{

    public function getAll()
    {
        if (!$event = CafeTypes::find()->all()) {
            throw new NotFoundException('Cafe Types not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = CafeTypes::find()->where(['id_cafe' => $id])->all();
        if (!$event) {
            throw new NotFoundException('Cafe Types not found');
        }
        return $event;
    }

    public function create(CafeTypes $item)
    {

        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(CafeTypes $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(CafeTypes $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }
}