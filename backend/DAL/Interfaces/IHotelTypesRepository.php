<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\HotelTypes;


interface IHotelTypesRepository
{
    public function getAll();

    public function get($id);

    public function create(HotelTypes $item);

    public function update(HotelTypes $item);

    public function delete(HotelTypes $delete);
}