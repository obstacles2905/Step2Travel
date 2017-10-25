<?php

namespace backend\models;


use backend\BLL\DTO\TourTypeDTO;
use yii\base\Model;

class TourTypeForm extends Model
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
        $dto = new TourTypeDTO();
        $dto->name = $this->name;
        $dto->icon = $this->icon;
        return $dto;
    }

    public function setDTO(TourType $origin)
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