<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;

use backend\BLL\DTO\HotelDTO;
use backend\DAL\Repositories\ARHotelRepository;
use backend\DAL\Repositories\ARHotelTypesRepository;
use backend\models\Hotel;
use backend\models\HotelTypes;


class HotelService
{

    private $HotelRepository;
    private $HotelTypesRepository;

    /**
     * PointService constructor.
     * @param $HotelRepository
     * @param $HotelTypesRepository
     */
    public function __construct(ARHotelRepository $HotelRepository,ARHotelTypesRepository $HotelTypesRepository)
    {
        $this->HotelRepository = $HotelRepository;
        $this->HotelTypesRepository = $HotelTypesRepository;
    }


    public function create(HotelDTO $dto)
    {
        $point = new Hotel();
        $point->setName($dto->name);
        $point->setDescription($dto->descriptionHotel);
        $point->setImageName($dto->image);
        $point->setRate($dto->rate);
        $point->setLongtitude($dto->longtitude);
        $point->setLatitude($dto->latitude);
        $point->setTour3d($dto->tour3d);

        $point->setId($this->HotelRepository->create($point));

        $this->createCategories($dto, $point);

        return $point;
    }

    public function get($id)
    {
        return $this->HotelRepository->get($id);
    }

    public function update(HotelDTO $dto, $id)
    {
        $point = $this->get($id);
        $point->setName($dto->name);
        $point->setDescription($dto->descriptionHotel);
        $point->setRate($dto->rate);
        $point->setImageName($dto->image);
        $point->setLongtitude($dto->longtitude);
        $point->setLatitude($dto->latitude);
        $point->setTour3d($dto->tour3d);

        $this->HotelRepository->update($point);

        $this->deleteCategories($id);
        $this->createCategories($dto, $point);

    }

    public function delete($id)
    {
        $point = $this->get($id);
        $this->HotelRepository->delete($point);
        $this->deleteCategories($id);
    }

    public function getAll()
    {
        return $this->HotelRepository->getAll();
    }

    private function deleteCategories($id)
    {
        $categories = $this->HotelTypesRepository->get($id);
        foreach ($categories as $category) {
            $this->HotelTypesRepository->delete($category);
        }
    }

    private function createCategories(HotelDTO $dto, Hotel $point)
    {
        foreach ($dto->category as $category) {
            $categories = new HotelTypes();
            $categories->setIdHotel($point->getId());
            $categories->setIdHoteltype($category);
            $this->HotelTypesRepository->create($categories);
        }

    }

    public function getOneApi($id)
    {
        return $this->HotelRepository->getOneApi($id);

    }

    public function getAllApi()
    {
        return $this->HotelRepository->getAllApi();
    }

}