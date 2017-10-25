<?php

namespace backend\DAL\Interfaces;

use backend\models\TourCategory;

interface ITourCategoryRepository
{
    public function getAll();

    public function get($id);

    public function create(TourCategory $item);

    public function update(TourCategory $item);

    public function delete(TourCategory $delete);
}