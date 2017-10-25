<?php

namespace backend\BLL\Services;

use backend\BLL\DTO\TourCategoryDTO;
use backend\DAL\Repositories\ARTourCategoryRepository;
use backend\models\TourCategory;
use yii\helpers\ArrayHelper;

class TourCategoryService
{

    private $TourCategoryRepository;

    /**
     * TourCategoryService constructor.
     * @param $TourCategoryRepository
     */
    public function __construct(ARTourCategoryRepository $TourCategoryRepository)
    {
        $this->TourCategoryRepository = $TourCategoryRepository;
    }


    public function create(TourCategoryDTO $dto)
    {
        $category = new TourCategory();
        $category->setName($dto->name);
        $category->setIcon($dto->icon);
        $this->TourCategoryRepository->create($category);
        return $category;
    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }

    public function get($id)
    {
        return $this->TourCategoryRepository->get($id);
    }

    public function update(TourCategoryDTO $dto, $id)
    {
        $category = $this->get($id);
        $category->setName($dto->name);
        $category->setIcon($dto->icon);
        $this->TourCategoryRepository->update($category);

    }

    public function delete($id)
    {
        $type = $this->get($id);
        $type->removeImages();
        $this->TourCategoryRepository->delete($type);
    }

    public function getAll()
    {
        return $this->TourCategoryRepository->getAll();
    }

    public function getAllApi()
    {
        $tourCategories = $this->TourCategoryRepository->getAllApi();

        return $tourCategories;
    }

}