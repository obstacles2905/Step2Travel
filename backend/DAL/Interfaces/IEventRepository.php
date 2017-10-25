<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 17:36
 */

namespace backend\DAL\Interfaces;

use backend\models\Event;

interface IEventRepository
{
    public function getAll();

    public function get($id);

    public function create(Event $item);

    public function update(Event $item);

    public function delete(Event $delete);
}