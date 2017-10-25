<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;

use backend\BLL\DTO\PointDTO;
use backend\DAL\Repositories\ARPointCategoriesRepository;
use backend\DAL\Repositories\ARPointRepository;
use backend\models\Point;
use backend\models\PointCategories;
use yii\helpers\ArrayHelper;


class PointService
{

    private $PointRepository;
    private $PointCategoriesRepository;

    /**
     * PointService constructor.
     * @param $PointRepository
     * @param $PointCategoriesRepository
     */
    public function __construct(ARPointRepository $PointRepository, ARPointCategoriesRepository $PointCategoriesRepository)
    {
        $this->PointRepository = $PointRepository;
        $this->PointCategoriesRepository = $PointCategoriesRepository;
    }


    public function create(PointDTO $dto)
    {
        $point = new Point();
        $point->setName($dto->name);
        $point->setDescriptionPoint($dto->descriptionPoint);
        $point->setShortDescriptionPoint($dto->shortDescriptionPoint);
        $point->setRate($dto->rate);
        $point->setImageName($dto->image);
        $point->setPanoramaName($dto->panorama);
        $point->setLongtitude($dto->longtitude);
        $point->setLatitude($dto->latitude);
        $point->setId($this->PointRepository->create($point));

        $this->createCategories($dto, $point);

        return $point;
    }

    public function get($id)
    {
        return $this->PointRepository->get($id);
    }

    public function update(PointDTO $dto, $id)
    {
        $point = $this->get($id);
        $point->setName($dto->name);
        $point->setDescriptionPoint($dto->descriptionPoint);
        $point->setShortDescriptionPoint($dto->shortDescriptionPoint);
        $point->setRate($dto->rate);
        $point->setImageName($dto->image);
        $point->setPanoramaName($dto->panorama);
        $point->setLongtitude($dto->longtitude);
        $point->setLatitude($dto->latitude);

        $this->PointRepository->update($point);

        $this->deleteCategories($id);
        $this->createCategories($dto, $point);

    }

    public function delete($id)
    {
        $point = $this->get($id);
        $this->PointRepository->delete($point);
        $point->removeImages();
        $this->deleteCategories($id);
    }
    
    public function getImage($id)
    {
        $point = $this->get($id);
        return $point->getImageByName($point->getImageName())->getUrl('300x200');
    }

    public function getPanorama($id)
    {
        $point = $this->get($id);
        return $point->getImageByName($point->getPanoramaName())->getUrl('300x200');
    }

    public function getAll()
    {
        return $this->PointRepository->getAll();
    }

    public function getListAll()
    {
        return ArrayHelper::map($this->getAll(),'id','name');
    }

    private function deleteCategories($id)
    {
        $categories = $this->PointCategoriesRepository->get($id);
        foreach ($categories as $category) {
            $this->PointCategoriesRepository->delete($category);
        }
    }

    private function createCategories(PointDTO $dto, Point $point)
    {
        foreach ($dto->category as $category) {
            $categories = new PointCategories();
            $categories->setIdPoint($point->getId());
            $categories->setIdPointcategory($category);
            $this->PointCategoriesRepository->create($categories);
        }

    }

    public function getOneApi($id)
    {
        return $this->PointRepository->getOneApi($id);

    }

    public function getAllApi()
    {
        return $this->PointRepository->getAllApi();
    }

}