<?php

namespace backend\models;

use backend\BLL\DTO\TourDTO;
use yii\base\Model;

class TourForm extends Model
{
    public $id;
    public $name;
    public $city;
    public $type;
    public $category;
    public $description;
    public $image;
    public $rate;
    public $points = [];
    public $tour3d;

    public function rules()
    {
        return [
            [
                ['name', 'city', 'type', 'category', 'description', 'rate', 'points'], 'required']
        ];
    }

    public function getDTO()
    {
        $dto = new TourDTO();
        $dto->name = $this->name;
        $dto->city = $this->city;
        $dto->type = $this->type;
        $dto->category = $this->category;
        $dto->description = $this->description;
        $dto->image = $this->image;
        $dto->rate = $this->rate;
        $dto->points = $this->points;
        $dto->tour3d = $this->tour3d;
        return $dto;
    }

    public function setDTO(Tour $origin)
    {
        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->city = $origin->getCity();
        $this->type = $origin->getType();
        $this->category = $origin->getCategory();
        $this->description = $origin->getDescription();
        $this->image = $origin->getImageName();
        $this->rate = $origin->getRate();
        $this->tour3d = $origin->getTour3d();
        $this->points = $origin->getPoints();
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Назва',
            'city' => 'Мiсто',
            'type' => 'Тип',
            'category' => 'Категорiя',
            'description' => 'Опис',
            'image' => 'Зображення',
            'rate' => 'Рейтинг',
            'points' => 'Пам\'ятки',
        ];
    }

    public function formName()
    {
        return 'tour';
    }
}