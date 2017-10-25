<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:38
 */

namespace backend\models;


use backend\BLL\DTO\HotelTypeDTO;


class HotelTypeForm extends BaseCategoryForm
{
    public function getDTO()
    {
        $dto = new HotelTypeDTO();
        $dto->name = $this->name;
        return $dto;
    }

    public function setDTO(HotelType $origin)
    {
        $this->id = $origin->getId();
        $this->name = $origin->getName();
    }
}