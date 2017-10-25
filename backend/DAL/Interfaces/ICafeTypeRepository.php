<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;
use backend\models\CafeType;

interface ICafeTypeRepository
{
    public function getAll();
    public function get($id);
    public function create(CafeType $item);
    public function update(CafeType $item);
    public function delete(CafeType $delete);
}