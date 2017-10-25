<?php

namespace backend\BLL\Services;


use backend\BLL\DTO\CityDTO;
use backend\BLL\Interfaces\ICityService;
use backend\DAL\Repositories\ARCityRepository;
use backend\models\City;
use yii\helpers\ArrayHelper;

class CityService implements ICityService
{
    private $cityRepository;

    /**
     * CafetypeService constructor.
     * @param $cityRepo
     */
    public function __construct(ARCityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
    }

    public function get($id)
    {
        return $this->cityRepository->get($id);
    }

    public function getFirst()
    {
        return $this->cityRepository->getFirst();
    }

    public function create(CityDTO $dto)
    {
        $city = new City();
        $city->setIp($dto->ip);
        $city->setName($dto->name);
        $city->setDescriptionCity($dto->descriptionCity);
        $city->setImageName($dto->image);
        $city->setPanoramaName($dto->panorama);
        $this->cityRepository->create($city);
        return $city;
    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }

    public function update(CityDTO $dto, $id)
    {
        $city = $this->get($id);
        $city->setId($dto->id);
        $city->setIp($dto->ip);
        $city->setName($dto->name);
        $city->setDescriptionCity($dto->descriptionCity);
        $city->setImageName($dto->image);
        $city->setPanoramaName($dto->panorama);
        $this->cityRepository->update($city);
    }

    public function delete($id)
    {
        $city=$this->get($id);
        $city->removeImages();
        $this->cityRepository->delete($city);
    }

    public function getAll()
    {
        return $this->cityRepository->getAll();
    }

    public function getFirstForApi()
    {
        return $this->cityRepository->getFirstForApi();
    }
}