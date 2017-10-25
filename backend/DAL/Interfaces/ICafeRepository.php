<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\Cafe;

interface ICafeRepository
{
    public function getAll();

    public function get($id);

    public function create(Cafe $item);

    public function update(Cafe $item);

    public function delete(Cafe $delete);
}