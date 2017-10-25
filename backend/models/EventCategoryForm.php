<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\EventCategoryDTO;

class EventCategoryForm extends BaseCategoryForm
{
    public function getDTO()
    {
        $dto = new EventCategoryDTO();
        $dto->name = $this->name;
        return $dto;
    }

    public function setDTO(EventCategory $origin)
    {
        $this->id = $origin->getId();
        $this->name = $origin->getName();
    }

}