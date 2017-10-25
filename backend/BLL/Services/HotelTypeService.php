<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;

use backend\DAL\Repositories\ARHotelTypeRepository;
use yii\helpers\ArrayHelper;
use backend\BLL\DTO\HotelTypeDTO;
use backend\models\HotelType;
class HotelTypeService
{

    private $HotelTypeRepository;

    /**
     * HotelTypeService constructor.
     * @param $HotelTypeRepository
     */
    public function __construct(ARHotelTypeRepository $HotelTypeRepository)
    {
        $this->HotelTypeRepository = $HotelTypeRepository;
    }


    public function create(HotelTypeDTO $dto)
    {
        $category = new HotelType();
        $category->setName($dto->name);
        $this->HotelTypeRepository->create($category);

    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }
    public function get($id)
    {
        return $this->HotelTypeRepository->get($id);
    }

    public function update(HotelTypeDTO $dto, $id)
    {

        $category = $this->get($id);
        $category->setName($dto->name);
        $this->HotelTypeRepository->update($category);

    }

    public function delete($id)
    {
        $main = $this->get($id);
        $this->HotelTypeRepository->delete($main);
    }

    public function getAll()
    {
        return $this->HotelTypeRepository->getAll();
    }

    public function getAllApi()
    {
        return $this->HotelTypeRepository->getAllApi();
    }
}