<?php

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\ITourRepository;
use backend\models\Tour;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class ARTourRepository implements ITourRepository
{
    public function getAll()
    {
        if (!$tour = Tour::find()->all()) {
            throw new NotFoundException('Tour not found');
        }
        return $tour;
    }

    public function get($id)
    {
        $tour = Tour::findOne($id);
        if (!$tour) {
            throw new NotFoundException('Tour not found');
        }
        return $tour;
    }

    public function create(Tour $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');
        return $item->getPrimaryKey();
    }

    public function update(Tour $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(Tour $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        $tours = $this->getAll();
        foreach ($tours as $tour) {
            $this->formatData($tour, 640, 450);
        }
        return $tours;
    }

    public function getOneApi($id)
    {
        $tour = $this->get($id);
        $this->formatData($tour, 1920, 1080);
        return $tour;
    }

    private function formatData(Tour &$tour, $imageWidth, $imageHeight)
    {
        $tour['image'] = Yii::getAlias('@server') . $tour->getImageByName($tour->getImageName())->getUrl($imageWidth . 'x' . $imageHeight);
        $tour['city'] = $tour->getCityFull();
        $tour['type'] = $tour->getTypeFull();
        $tour['category'] = $tour->getCategoryFull();
        $tour['points'] = $tour->getPoints();
        if ($tour->getTour3d()) $tour['tour3d'] = 'upload/tour3d/tours/' . $tour->getTour3d() . '/index.html';
    }
}