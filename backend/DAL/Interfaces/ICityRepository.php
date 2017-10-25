<?php

namespace backend\DAL\Interfaces;

use backend\models\City;

interface ICityRepository
{
    public function getAll();

    public function get($id);

    public function create(City $item);

    public function update(City $item);

    public function delete(City $delete);
}