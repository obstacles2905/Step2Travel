<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:22
 */

namespace backend\BLL\DTO;


class CafeDTO
{
    public $id;
    public $name;
    public $image;
    public $descriptionCafe;
    public $rate;
    public $latitude;
    public $longtitude;
    public $tour3d;
    public $category=[];
}