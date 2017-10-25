<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;

use yii\helpers\ArrayHelper;

use backend\DAL\Repositories\ARCafeTypeRepository;
use backend\BLL\DTO\CafeTypeDTO;
use backend\models\CafeType;
class CafeTypeService
{

    private $CafeTypeRepository;

    /**
     * CafeTypeService constructor.
     * @param $CafeTypeRepository
     */
    public function __construct(ARCafeTypeRepository $CafeTypeRepository)
    {
        $this->CafeTypeRepository = $CafeTypeRepository;
    }


    public function create(CafeTypeDTO $dto)
    {
        $category = new CafeType();
        $category->setName($dto->name);
        $this->CafeTypeRepository->create($category);

    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }
    public function get($id)
    {
        return $this->CafeTypeRepository->get($id);
    }

    public function update(CafeTypeDTO $dto, $id)
    {

        $category = $this->get($id);
        $category->setName($dto->name);
        $this->CafeTypeRepository->update($category);

    }

    public function delete($id)
    {
        $main = $this->get($id);
        $this->CafeTypeRepository->delete($main);
    }

    public function getAll()
    {
        return $this->CafeTypeRepository->getAll();
    }

    public function getAllApi()
    {
        return $this->CafeTypeRepository->getAllApi();
    }
}