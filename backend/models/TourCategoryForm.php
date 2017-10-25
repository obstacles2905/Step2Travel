<?php

namespace backend\models;


use backend\BLL\DTO\TourCategoryDTO;
use yii\base\Model;

class TourCategoryForm extends Model
{
    public $id;
    public $name;
    public $icon;

    public function rules()
    {
        return [
            [
                ['name'], 'required'],
        ];
    }

    public function getDTO()
    {
        $dto = new TourCategoryDTO();
        $dto->name = $this->name;
        $dto->icon = $this->icon;
        return $dto;
    }

    public function setDTO(TourCategory $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->icon = $origin->getIcon();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'icon' => 'Icon',
        ];
    }

}