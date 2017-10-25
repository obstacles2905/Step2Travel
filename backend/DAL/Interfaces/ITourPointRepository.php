<?php

namespace backend\DAL\Interfaces;

use backend\models\TourPoint;

interface ITourPointRepository
{
    public function getAll();

    public function get($id);

    public function create(TourPoint $item);

    public function update(TourPoint $item);

    public function delete(TourPoint $delete);
}