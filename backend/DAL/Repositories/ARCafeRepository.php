<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;

use backend\models\Cafe;
use backend\models\CafeType;
use backend\models\CafeTypes;

use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use backend\DAL\Interfaces\ICafeRepository;
use Yii;

class ARCafeRepository implements ICafeRepository
{

    public function getAll()
    {
        if (!$event = Cafe::find()->all()) {
            throw new NotFoundException('Cafe not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = Cafe::findOne($id);
        if (!$event) {
            throw new NotFoundException('Cafe not found');
        }

        return $event;
    }

    public function create(Cafe $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');
        return $item->getPrimaryKey();
    }

    public function update(Cafe $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(Cafe $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getOneApi($id)
    {
        $cafe = $this->get($id);
        $this->setCategories($cafe);
        $this->setImages($cafe, 1920, 1080);
        return $cafe;
    }

    public function getAllApi()
    {
        $cafes = $this->getAll();
        foreach ($cafes as $cafe) {
            $this->setCategories($cafe);
            $this->setImages($cafe, 640, 450);
        }
        return $cafes;
    }

    private function setCategories(Cafe &$cafe)
    {
        if (!$categories = CafeType::find()->select(['cafe_type.id', 'cafe_type.name'])->innerJoin(CafeTypes::tableName(), 'cafe_type.id=cafe_types.id_cafetype')->where(['cafe_types.id_cafe' => $cafe['id']])->all())
            throw new NotFoundException("no categories for cafe");
        $cafe['category'] = $categories[0];

    }

    private function setImages(Cafe &$cafe, $imageWidth, $imageHeigth)
    {
        $cafe['image'] = Yii::getAlias('@server') . $cafe->getImageByName($cafe->getImageName())->getUrl($imageWidth . 'x' . $imageHeigth);
    }

}