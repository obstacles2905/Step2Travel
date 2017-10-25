<?php

namespace backend\BLL\Interfaces;

use backend\BLL\DTO\CityDTO;

interface ICityService
{
    public function create(CityDTO $dto);
}