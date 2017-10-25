<?php

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\ICityRepository;

use backend\models\City;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class ARCityRepository implements ICityRepository
{
    public function getAll()
    {
        if (!$city = City::find()->all()) {
            throw new NotFoundException('No city found');
        }
        return $city;
    }

    public function get($id)
    {
        if (!$city = City::findOne($id)) {
            throw new NotFoundException('City not found');
        }
        return $city;
    }

    public function getFirst()
    {
        if (!$city = City::find()->limit(1)->all()) {
            throw new NotFoundException('City not found');
        }
        return $city;
    }

    public function create(City $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(City $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(City $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getFirstForApi()
    {
        $cities = $this->getFirst();
        $city = $cities[0];
        $this->formatData($city);
        return $city;
    }

    private function formatData(City &$city)
    {
        $city['image'] = Yii::getAlias('@server') . $city->getImageByName($city->getImageName())->getUrl('1920x1080');
        $city['panorama'] = Yii::getAlias('@server') . $city->getImageByName($city->getPanoramaName())->getUrl();
    }
}