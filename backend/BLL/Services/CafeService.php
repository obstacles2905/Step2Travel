<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;

use backend\BLL\DTO\CafeDTO;
use backend\DAL\Repositories\ARCafeRepository;
use backend\DAL\Repositories\ARCafeTypesRepository;
use backend\models\Cafe;
use backend\models\CafeTypes;


class CafeService
{

    private $CafeRepository;
    private $CafeTypesRepository;

    /**
     * HotelService constructor.
     * @param $CafeRepository
     * @param $CafeTypesRepository
     */
    public function __construct(ARCafeRepository $CafeRepository,ARCafeTypesRepository $CafeTypesRepository)
    {
        $this->CafeRepository = $CafeRepository;
        $this->CafeTypesRepository = $CafeTypesRepository;
    }


    public function create(CafeDTO $dto)
    {
        $cafe = new Cafe();
        $cafe->setName($dto->name);
        $cafe->setDescription($dto->descriptionCafe);
        $cafe->setImageName($dto->image);
        $cafe->setRate($dto->rate);
        $cafe->setLongtitude($dto->longtitude);
        $cafe->setLatitude($dto->latitude);
        $cafe->setTour3d($dto->tour3d);

        $cafe->setId($this->CafeRepository->create($cafe));

        $this->createCategories($dto, $cafe);

        return $cafe;

    }

    public function get($id)
    {
        return $this->CafeRepository->get($id);
    }

    public function update(CafeDTO $dto, $id)
    {
        $cafe = $this->get($id);
        $cafe->setName($dto->name);
        $cafe->setDescription($dto->descriptionCafe);
        $cafe->setRate($dto->rate);
        $cafe->setImageName($dto->image);
        $cafe->setLongtitude($dto->longtitude);
        $cafe->setLatitude($dto->latitude);
        $cafe->setTour3d($dto->tour3d);

        $this->CafeRepository->update($cafe);

        $this->deleteCategories($id);
        $this->createCategories($dto, $cafe);

    }

    public function delete($id)
    {
        $point = $this->get($id);
        $this->CafeRepository->delete($point);
        $this->deleteCategories($id);
    }

    public function getAll()
    {
        return $this->CafeRepository->getAll();
    }

    private function deleteCategories($id)
    {
        $categories = $this->CafeTypesRepository->get($id);
        foreach ($categories as $category) {
            $this->CafeTypesRepository->delete($category);
        }
    }

    private function createCategories(CafeDTO $dto, Cafe $cafe)
    {
        foreach ($dto->category as $category) {
            $categories = new CafeTypes();
            $categories->setIdCafe($cafe->getId());
            $categories->setIdCafetype($category);
            $this->CafeTypesRepository->create($categories);
        }

    }

    public function getOneApi($id)
    {
        return $this->CafeRepository->getOneApi($id);

    }

    public function getAllApi()
    {
        return $this->CafeRepository->getAllApi();
    }

}