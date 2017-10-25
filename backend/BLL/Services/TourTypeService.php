<?php

namespace backend\BLL\Services;

use backend\BLL\DTO\TourTypeDTO;
use backend\DAL\Repositories\ARTourTypeRepository;
use backend\models\TourType;
use yii\helpers\ArrayHelper;

class TourTypeService
{

    private $TourTypeRepository;

    /**
     * TourTypeService constructor.
     * @param $TourTypeRepository
     */
    public function __construct(ARTourTypeRepository $TourTypeRepository)
    {
        $this->TourTypeRepository = $TourTypeRepository;
    }


    public function create(TourTypeDTO $dto)
    {
        $type = new TourType();
        $type->setName($dto->name);
        $type->setIcon($dto->icon);
        $this->TourTypeRepository->create($type);
        return $type;
    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }

    public function get($id)
    {
        return $this->TourTypeRepository->get($id);
    }

    public function update(TourTypeDTO $dto, $id)
    {
        $type = $this->get($id);
        $type->setName($dto->name);
        $type->setIcon($dto->icon);
        $this->TourTypeRepository->update($type);

    }

    public function delete($id)
    {
        $type = $this->get($id);
        $this->TourTypeRepository->delete($type);
    }

    public function getAll()
    {
        return $this->TourTypeRepository->getAll();
    }

    public function getAllApi()
    {
        return $this->TourTypeRepository->getAllApi();
    }
}