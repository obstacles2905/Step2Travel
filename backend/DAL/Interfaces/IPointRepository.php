<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\Point;

interface IPointRepository
{
    public function getAll();

    public function get($id);

    public function create(Point $item);

    public function update(Point $item);

    public function delete(Point $delete);
}