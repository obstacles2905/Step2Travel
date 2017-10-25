<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;


use backend\BLL\DTO\EventCategoryDTO;


use backend\DAL\Repositories\AREventCategoryRepository;


use backend\models\EventCategory;
use yii\helpers\ArrayHelper;


class EventCategoryService
{

    private $EventCategoryRepository;

    /**
     * EventCategoryService constructor.
     * @param $EventCategoryRepository
     */
    public function __construct(AREventCategoryRepository $EventCategoryRepository)
    {
        $this->EventCategoryRepository = $EventCategoryRepository;
    }


    public function create(EventCategoryDTO $dto)
    {
        $category = new EventCategory();
        $category->setName($dto->name);
        $this->EventCategoryRepository->create($category);

    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }
    public function get($id)
    {
        return $this->EventCategoryRepository->get($id);
    }

    public function update(EventCategoryDTO $dto, $id)
    {

        $category = $this->get($id);
        $category->setName($dto->name);
        $this->EventCategoryRepository->update($category);

    }

    public function delete($id)
    {
        $main = $this->get($id);
        $this->EventCategoryRepository->delete($main);
    }

    public function getAll()
    {
        return $this->EventCategoryRepository->getAll();
    }

    public function getAllApi()
    {
        return $this->EventCategoryRepository->getAllApi();
    }
}