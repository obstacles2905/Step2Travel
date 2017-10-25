<?php

namespace backend\DAL\Interfaces;

use backend\models\Tour;

interface ITourRepository
{
    public function getAll();

    public function get($id);

    public function create(Tour $item);

    public function update(Tour $item);

    public function delete(Tour $delete);
}