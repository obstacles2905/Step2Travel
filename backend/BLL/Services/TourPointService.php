<?php

namespace backend\BLL\Services;

use backend\BLL\DTO\TourPointDTO;
use backend\DAL\Repositories\ARTourPointRepository;
use backend\models\TourPoint;
use yii\helpers\ArrayHelper;

class TourPointService
{
    private $tourPointRepository;

    /**
     * TourPointService constructor.
     * @param $tourPointRepository
     */
    public function __construct(ARTourPointRepository $tourPointRepository)
    {
        $this->tourPointRepository = $tourPointRepository;
    }

    public function createForTour(TourPointDTO $dto)
    {
        foreach ($dto as $item) {
            $point = new TourPoint();
            $point = setIdTour($item->idTour);
            $point = setIdPoint($item->idPoint);

            $this->tourPointRepository->create($point);
        }
    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }

    public function getAll()
    {
        return $this->tourPointRepository->getAll();
    }
}