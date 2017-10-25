<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IPointRepository;
use backend\models\Point;
use backend\models\PointCategories;
use backend\models\PointCategory;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class ARPointRepository implements IPointRepository
{

    public function getAll()
    {
        if (!$event = Point::find()->all()) {
            throw new NotFoundException('Point not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = Point::findOne($id);
        if (!$event) {
            throw new NotFoundException('Point not found');
        }

        return $event;
    }

    public function create(Point $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');
        return $item->getPrimaryKey();
    }

    public function update(Point $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(Point $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getOneApi($id)
    {
        $point = $this->get($id);
        $this->setCategories($point);
        $this->setImages($point, 1920, 1080);
        return $point;
    }

    public function getAllApi()
    {
        $points = $this->getAll();
        foreach ($points as $point) {
            $this->setCategories($point);
            $this->setImages($point, 640, 450);
        }

        return $points;
    }

    private function setCategories(Point &$point)
    {
        if (!$categories = PointCategory::find()->select(['point_category.id', 'point_category.name'])->innerJoin(PointCategories::tableName(), 'point_category.id=point_categories.id_pointcategory')->where(['point_categories.id_point' => $point['id']])->all())
            throw new NotFoundException("no categories for point");
        $point['category'] = $categories[0];
    }

    private function setImages(Point &$point, $imageWidth, $imageHeight)
    {
        $point['image'] = Yii::getAlias('@server') . $point->getImageByName($point->getImageName())->getUrl($imageWidth . 'x' . $imageHeight);
        $point['panorama'] = Yii::getAlias('@server') . $point->getImageByName($point->getPanoramaName())->getUrl();
    }
}