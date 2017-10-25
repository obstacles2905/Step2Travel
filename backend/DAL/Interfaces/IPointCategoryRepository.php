<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;


use backend\models\PointCategory;

interface IPointCategoryRepository
{
    public function getAll();

    public function get($id);

    public function create(PointCategory $item);

    public function update(PointCategory $item);

    public function delete(PointCategory $delete);
}