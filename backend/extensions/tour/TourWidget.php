<?php

namespace backend\extensions\tour;

use backend\DAL\Interfaces\NotFoundException;
use yii\base\Widget;

class TourWidget extends Widget
{
    public $data;

    public function init()
    {
        parent::init();
        if ($this->data === null) {
            throw new NotFoundException("No data in array!");
        }
    }

    public function run()
    {
        return $this->render('index', ['data' => $this->data]);
    }
}
