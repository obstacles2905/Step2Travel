<?php

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\ITourPointRepository;
use backend\models\TourPoint;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;

class ARTourPointRepository implements ITourPointRepository
{

    public function getAll()
    {
        if (!$points = TourPoint::find()->all()) {
            throw new NotFoundException('Tour points not found');
        }
        return $points;
    }

    public function get($id)
    {
        $point = TourPoint::findOne($id);
        if (!$point) {
            throw new NotFoundException('Tour point not found');
        }

        return $point;
    }

    public function getTourPoints($id)
    {
        $points = TourPoint::find()->where(['idTour' => $id])->all();
        if (!$points) {
            throw new NotFoundException('Points not found');
        }
        return $points;
    }

    public function create(TourPoint $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');

    }

    public function update(TourPoint $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(TourPoint $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }


}