<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\PointCategoryDTO;

class PointCategoryForm extends BaseCategoryForm
{


    public function getDTO()
    {
        $dto = new PointCategoryDTO();
        $dto->name = $this->name;
        return $dto;
    }

    public function setDTO(PointCategory $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
    }


}