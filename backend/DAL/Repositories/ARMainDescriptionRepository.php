<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IMainDescriptionRepository;
use backend\models\MainDescription;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;

class ARMainDescriptionRepository implements IMainDescriptionRepository
{


    public function getAll()
    {
        if (!$main = MainDescription::find()->all()) {
            throw new NotFoundException('No main descriptions found');
        }
        return $main;
    }

    public function get($id)
    {

        if (!$main = MainDescription::findOne($id)) {
            throw new NotFoundException('Main description not found');
        }
        return $main;
    }


    public function create(MainDescription $item)
    {

        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(MainDescription $item)
    {

        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(MainDescription $item)
    {
        if (MainDescription::find()->asArray()->count() == 1)
            throw new RuntimeException('At least one column required!');

        if (!$item->delete())
            throw new RuntimeException('can\'t delete');


    }
}
