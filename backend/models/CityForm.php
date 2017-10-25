<?php

namespace backend\models;

use backend\BLL\DTO\CityDTO;
use backend\BLL\Services\CityService;
use yii\base\Model;
/**
 * @property integer $id
 * @property string $ip
 * @property string $name
 * @property string $descriptionCity
 * @property string $image
 * @property string $panorama
 */
class CityForm extends Model
{
    public $id;
    public $ip;
    public $name;
    public $descriptionCity;
    public $image;
    public $panorama;
    public $primaryKey = 'id';
    //public $panoroma;

//    public function behaviors()
//    {
//        return [
//            'image' => [
//                'class' => 'rico\yii2images\behaviors\ImageBehave',
//            ],
//            'panorama' => [
//                'class' => 'rico\yii2images\behaviors\ImageBehave',
//            ]
//        ];
//    }

    public function rules()
    {
        return [
            [['ip', 'name', 'descriptionCity'], 'required'],
        ];
    }
    public function getDTO()
    {
        $dto = new CityDTO();
        $dto->id = $this->id;
        $dto->ip = $this->ip;
        $dto->name = $this->name;
        $dto->descriptionCity = $this->descriptionCity;
        $dto->image = $this->image;
        $dto->panorama = $this->panorama;
        return $dto;
    }

    public function setDTO(City $city)
    {
        $this->id = $city->id;
        $this->ip = $city->ip;
        $this->name = $city->name;
        $this->descriptionCity = $city->descriptionCity;
        $this->image = $city->image;
        $this->panorama = $city->panorama;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'ip' => 'Ip',
            'name' => 'Name',
            'descriptionCity' => 'Description City',
            'image' => 'Image',
            'panorama' => 'Panorama',
        ];
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @return array primary key of the table
     **/
    public function primaryKey()
    {
        return array('id');
    }
}