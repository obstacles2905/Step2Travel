<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;
use backend\models\HotelType;

interface IHotelTypeRepository
{
    public function getAll();
    public function get($id);
    public function create(HotelType $item);
    public function update(HotelType $item);
    public function delete(HotelType $delete);
}