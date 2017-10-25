<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\Hotel;

interface IHotelRepository
{
    public function getAll();

    public function get($id);

    public function create(Hotel $item);

    public function update(Hotel $item);

    public function delete(Hotel $delete);
}