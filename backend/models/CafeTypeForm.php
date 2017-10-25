<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:38
 */

namespace backend\models;


use backend\BLL\DTO\CafeTypeDTO;


class CafeTypeForm extends BaseCategoryForm
{
    public function getDTO()
    {
        $dto = new CafeTypeDTO();
        $dto->name = $this->name;
        return $dto;
    }

    public function setDTO(CafeType $origin)
    {
        $this->id = $origin->getId();
        $this->name = $origin->getName();
    }
}