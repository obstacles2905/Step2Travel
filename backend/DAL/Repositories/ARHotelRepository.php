<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;


use backend\DAL\Interfaces\IHotelRepository;
use backend\models\Hotel;
use backend\models\HotelType;
use backend\models\HotelTypes;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class ARHotelRepository implements IHotelRepository
{

    public function getAll()
    {
        if (!$event = Hotel::find()->all()) {
            throw new NotFoundException('Hotel not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = Hotel::findOne($id);
        if (!$event) {
            throw new NotFoundException('Hotel not found');
        }

        return $event;
    }

    public function create(Hotel $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');
        return $item->getPrimaryKey();
    }

    public function update(Hotel $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(Hotel $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getOneApi($id)
    {
        $hotel = $this->get($id);
        $this->setCategories($hotel);
        $this->setImages($hotel, 1920, 1080);
        return $hotel;
    }

    public function getAllApi()
    {
        $hotels = $this->getAll();
        foreach ($hotels as $hotel) {
            $this->setCategories($hotel);
            $this->setImages($hotel, 640, 450);
        }
        return $hotels;
    }

    private function setCategories(Hotel &$hotel)
    {
        if (!$categories = HotelType::find()->select(['hotel_type.id', 'hotel_type.name'])->innerJoin(HotelTypes::tableName(), 'hotel_type.id=hotel_types.id_hoteltype')->where(['hotel_types.id_hotel' => $hotel['id']])->all())
            throw new NotFoundException("no categories for hotel");
        $hotel['category'] = $categories[0];
    }

    private function setImages(Hotel &$hotel, $imageWidth, $imageHeigth)
    {
        $hotel['image'] = Yii::getAlias('@server') . $hotel->getImageByName($hotel->getImageName())->getUrl($imageWidth . 'x' . $imageHeigth);
    }
}