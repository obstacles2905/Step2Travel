<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\PointDTO;
use yii\base\Model;


class PointForm extends Model
{

    public $id;
    public $name;
    public $rate;
    public $image;
    public $panorama;
    public $descriptionPoint;
    public $shortDescriptionPoint;
    public $latitude;
    public $longtitude;
    public $category=[];

    public function rules()
    {
        return [
            [
                ['name','category', 'descriptionPoint', 'latitude', 'longtitude', 'rate', 'shortDescriptionPoint'], 'required'],
                //[['image', 'panorama'], 'file', 'extensions' => 'png, jpg'],
        ];
    }


    public function getDTO()
    {

        $dto = new PointDTO();
        $dto->name = $this->name;
        $dto->rate = $this->rate;
        $dto->image = $this->image;
        $dto->panorama = $this->panorama;
        $dto->descriptionPoint = $this->descriptionPoint;
        $dto->shortDescriptionPoint = $this->shortDescriptionPoint;
        $dto->latitude = $this->latitude;
        $dto->longtitude = $this->longtitude;
        $dto->category=$this->category;
        return $dto;
    }


    public function setDTO(Point $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->rate = $origin->getRate();
        $this->image = $origin->getImageName();
        $this->panorama = $origin->getPanoramaName();
        $this->descriptionPoint = $origin->getDescriptionPoint();
        $this->shortDescriptionPoint = $origin->getShortDescriptionPoint();
        $this->latitude = $origin->getLatitude();
        $this->longtitude = $origin->getLongtitude();
        $this->category=$origin->getCategory();

    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'rate' => 'Rating',
            'image' => 'Image',
            'panorama' => 'Panorama',
            'descriptionPoint' => 'point description',
            'shortDescriptionPoint' => 'point short description',
            'latitude' => 'latitude',
            'longtitude' => 'longtitude',
            'category'=>'category',
        ];
    }

}