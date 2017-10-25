<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\HotelDTO;

use yii\base\Model;


class HotelForm extends Model
{

    public $id;
    public $name;
    public $rate;
    public $image;
    public $descriptionHotel;
    public $latitude;
    public $longtitude;
    public $tour3d;
    public $category=[];

    public function rules()
    {
        return [
            [['name','category', 'descriptionHotel', 'latitude', 'longtitude', 'rate'], 'required'],
            [['tour3d'], 'file', 'extensions' => 'zip', 'skipOnEmpty' => true],
            [['image'], 'image', 'extensions' => 'jpg, png', 'skipOnEmpty' => true],
        ];
    }


    public function getDTO()
    {
        $dto = new HotelDTO();
        $dto->name = $this->name;
        $dto->rate = $this->rate;
        $dto->image = $this->image;
        $dto->descriptionHotel = $this->descriptionHotel;
        $dto->latitude = $this->latitude;
        $dto->longtitude = $this->longtitude;
        $dto->category=$this->category;
        $dto->tour3d = $this->tour3d;

        return $dto;
    }


    public function setDTO(Hotel $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->rate = $origin->getRate();
        $this->image = $origin->getImageName();
        $this->descriptionHotel = $origin->getDescription();
        $this->latitude = $origin->getLatitude();
        $this->longtitude = $origin->getLongtitude();
        $this->category = $origin->getCategory();
        $this->tour3d = $origin->getTour3d();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'rate' => 'Rating',
            'image' => 'Image',
            'tour3d' => 'Tour 3D',
            'descriptionHotel' => 'hotel description',
            'latitude' => 'latitude',
            'longtitude' => 'longtitude',
            'category'=>'category',
        ];
    }
}