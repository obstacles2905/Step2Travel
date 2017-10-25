<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:22
 */

namespace backend\BLL\DTO;


class PointDTO
{
    public $id;
    public $name;
    public $rate;
    public $image;
    public $panorama;
    public $descriptionPoint;
    public $shortDescriptionPoint;
    public $latitude;
    public $longtitude;
    public $category=[];
}