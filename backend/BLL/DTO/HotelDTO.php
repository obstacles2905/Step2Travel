<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:22
 */

namespace backend\BLL\DTO;


class HotelDTO
{
    public $id;
    public $name;
    public $rate;
    public $image;
    public $descriptionHotel;
    public $latitude;
    public $longtitude;
    public $tour3d;
    public $category=[];
}