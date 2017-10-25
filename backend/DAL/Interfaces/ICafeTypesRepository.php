<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\CafeTypes;


interface ICafeTypesRepository
{
    public function getAll();

    public function get($id);

    public function create(CafeTypes $item);

    public function update(CafeTypes $item);

    public function delete(CafeTypes $delete);
}