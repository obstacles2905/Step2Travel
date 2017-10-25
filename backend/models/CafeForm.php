<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\CafeDTO;

use yii\base\Model;


class CafeForm extends Model
{

    public $id;
    public $name;
    public $rate;
    public $image;
    public $descriptionCafe;
    public $latitude;
    public $longtitude;
    public $tour3d;
    public $category = [];

    public function rules()
    {
        return [
            [['name', 'category', 'descriptionCafe', 'latitude', 'longtitude', 'rate'], 'required'],
            [['name'], 'string', 'max' => 50, 'min' => 2],
            [['rate'], 'double', 'max' => 5, 'min' => 0],
            [['descriptionCafe'], 'string', 'max' => 900, 'min' => 2],
            [['longtitude'], 'number', 'max' => 180, 'min' => -180],
            [['latitude'], 'number', 'max' => 90, 'min' => -90],
            [['tour3d'], 'file', 'extensions' => 'zip', 'skipOnEmpty' => true],
            [['image'], 'image', 'extensions' => 'jpg, png', 'skipOnEmpty' => true],
        ];
    }


    public function getDTO()
    {

        $dto = new CafeDTO();
        $dto->name = $this->name;
        $dto->rate = $this->rate;
        $dto->image = $this->image;
        $dto->descriptionCafe = $this->descriptionCafe;
        $dto->latitude = $this->latitude;
        $dto->longtitude = $this->longtitude;
        $dto->category = $this->category;
        $dto->tour3d = $this->tour3d;

        return $dto;
    }


    public function setDTO(Cafe $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->rate = $origin->getRate();
        $this->image = $origin->getImageName();
        $this->descriptionCafe = $origin->getDescription();
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
            'descriptionCafe' => 'cafe description',
            'latitude' => 'latitude',
            'longtitude' => 'longtitude',
            'category' => 'category',
        ];
    }

}