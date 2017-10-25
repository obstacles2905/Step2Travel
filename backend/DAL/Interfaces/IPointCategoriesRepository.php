<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\PointCategories;


interface IPointCategoriesRepository
{
    public function getAll();

    public function get($id);

    public function create(PointCategories $item);

    public function update(PointCategories $item);

    public function delete(PointCategories $delete);
}