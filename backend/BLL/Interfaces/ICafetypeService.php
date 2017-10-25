<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:17
 */

namespace backend\BLL\Interfaces;
use backend\BLL\DTO\CafetypeDTO;

interface ICafetypeService
{
    public function createInService(CafetypeDTO $dto);
}