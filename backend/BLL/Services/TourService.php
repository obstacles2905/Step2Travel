<?php

namespace backend\BLL\Services;

use backend\BLL\DTO\TourDto;
use backend\DAL\Repositories\ARTourPointRepository;
use backend\DAL\Repositories\ARTourRepository;
use backend\models\Tour;
use backend\models\TourPoint;

class TourService
{
    private $tourRepository;
    private $tourPointRepository;

    /**
     * TourService constructor.
     * @param ARTourRepository $tourRepository
     * @param ARTourPointRepository $tourPointRepository
     */
    public function __construct(ARTourRepository $tourRepository, ARTourPointRepository $tourPointRepository)
    {
        $this->tourRepository = $tourRepository;
        $this->tourPointRepository = $tourPointRepository;
    }

    public function create(TourDTO $dto)
    {
        $tour = new Tour();
        $tour->setName($dto->name);
        $tour->setCity($dto->city);
        $tour->setType($dto->type);
        $tour->setCategory($dto->category);
        $tour->setDescription($dto->description);
        $tour->setImageName($dto->image);
        $tour->setRate($dto->rate);
        $tour->setTour3d($dto->tour3d);
        $tour->setId($this->tourRepository->create($tour));

        $this->createTourPoints($dto, $tour);

        return $tour;
    }

    public function get($id)
    {
        return $this->tourRepository->get($id);
    }

    public function update(TourDTO $dto, $id)
    {
        $tour = $this->get($id);
        $tour->setName($dto->name);
        $tour->setCity($dto->city);
        $tour->setType($dto->type);
        $tour->setCategory($dto->category);
        $tour->setDescription($dto->description);
        $tour->setImageName($dto->image);
        $tour->setRate($dto->rate);
        $tour->setTour3d($dto->tour3d);
        $this->tourRepository->update($tour);

        $this->deleteTourPoints($id);
        $this->createTourPoints($dto, $tour);
    }

    private function createTourPoints(TourDTO $dto, Tour $tour)
    {
        foreach ($dto->points as $point) {
            $tourPoint = new TourPoint();
            $tourPoint->setIdTour($tour->getId());
            $tourPoint->setIdPoint($point);
            $this->tourPointRepository->create($tourPoint);
        }
    }

    private function deleteTourPoints($id)
    {
        $tourPoints = $this->tourPointRepository->getTourPoints($id);
        foreach ($tourPoints as $tourPoint) {
            $this->tourPointRepository->delete($tourPoint);
        }
    }

    public function delete($id)
    {
        $tour = $this->get($id);
        $this->deleteTourPoints($id);
        $this->tourRepository->delete($tour);
    }

    public function getImage($id)
    {
        $tour = $this->get($id);
        return $tour->getImage()->getUrl('300x200');
    }

    public function getAll()
    {
        return $this->tourRepository->getAll();
    }

    /**
     * @return mixed
     */
    public function getOneApi($id)
    {
        return $this->tourRepository->getOneApi($id);
    }

    /**
     * @return mixed
     */
    public function getAllApi()
    {
        return $this->tourRepository->getAllApi();
    }
}