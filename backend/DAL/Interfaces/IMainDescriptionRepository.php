<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;


use backend\models\MainDescription;

interface IMainDescriptionRepository
{
    public function getAll();

    public function get($id);

    public function create(MainDescription $item);

    public function update(MainDescription $item);

    public function delete(MainDescription $delete);
}