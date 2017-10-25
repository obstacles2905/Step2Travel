<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\EventCategory;

interface IEventCategoryRepository
{
    public function getAll();

    public function get($id);

    public function create(EventCategory $item);

    public function update(EventCategory $item);

    public function delete(EventCategory $delete);
}