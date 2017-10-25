<?php

namespace backend\BLL\DTO;

class TourDTO
{
    public $id;
    public $name;
    public $city;
    public $type;
    public $category;
    public $description;
    public $image;
    public $rate;
    public $points = [];
    public $tour3d;
}