<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;
use backend\BLL\DTO\PointCategoryDTO;
use backend\models\PointCategory;
use backend\DAL\Repositories\ARPointCategoryRepository;
use yii\helpers\ArrayHelper;


class PointCategoryService
{

    private $PointCategoryRepository;

    /**
     * PointCategoryService constructor.
     * @param $PointCategoryRepository
     */
    public function __construct(ARPointCategoryRepository $PointCategoryRepository)
    {
        $this->PointCategoryRepository = $PointCategoryRepository;
    }


    public function create(PointCategoryDTO $dto)
    {
        $category = new PointCategory();
        $category->setName($dto->name);
        $this->PointCategoryRepository->create($category);

    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }
    public function get($id)
    {
        return $this->PointCategoryRepository->get($id);
    }

    public function update(PointCategoryDTO $dto, $id)
    {

        $category = $this->get($id);
        $category->setName($dto->name);
        $this->PointCategoryRepository->update($category);

    }

    public function delete($id)
    {
        $main = $this->get($id);
        $this->PointCategoryRepository->delete($main);
    }

    public function getAll()
    {
        return $this->PointCategoryRepository->getAll();
    }

    public function getAllApi()
    {
       return $this->PointCategoryRepository->getAllApi();
    }
}