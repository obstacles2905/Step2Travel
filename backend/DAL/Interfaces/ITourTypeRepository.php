<?php

namespace backend\DAL\Interfaces;

use backend\models\TourType;

interface ITourTypeRepository
{
    public function getAll();

    public function get($id);

    public function create(TourType $item);

    public function update(TourType $item);

    public function delete(TourType $delete);
}