<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\EventDTO;
use yii\base\Model;

class EventForm extends Model
{

    public $id;
    public $name;
    public $city;
    public $image;
    public $descriptionEvent;
    public $date;
    public $latitude;
    public $longtitude;
    public $begin;
    public $end;
    public $category;

    public function rules()
    {
        return [
            [
                ['name', 'city', 'descriptionEvent', 'date', 'latitude', 'longtitude', 'begin', 'end', 'category'], 'required'],

        ];
    }


    public function getDTO()
    {
        $dto = new EventDTO();
        $dto->name = $this->name;
        $dto->city = $this->city;
        $dto->image = $this->image;
        $dto->descriptionEvent = $this->descriptionEvent;
        $dto->latitude = $this->latitude;
        $dto->longtitude = $this->longtitude;
        $dto->begin = $this->begin;
        $dto->end = $this->end;
        $dto->category = $this->category;
        $dto->date = $this->date;
        return $dto;
    }


    public function setDTO(Event $origin)
    {

        $this->id = $origin->getId();
        $this->name = $origin->getName();
        $this->city = $origin->getCity();
        $this->image = $origin->getImageName();
        $this->descriptionEvent = $origin->getDescriptionEvent();
        $this->latitude = $origin->getLatitude();
        $this->longtitude = $origin->getLongtitude();
        $this->begin = $origin->getBegin();
        $this->end = $origin->getEnd();
        $this->category = $origin->getCategory();
        $this->date = $origin->getDate();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'city' => 'City',
            'image' => 'Image',
            'descriptionEvent' => 'event description',
            'latitude' => 'latitude',
            'longtitude' => 'longtitude',
            'begin' => 'start time',
            'end' => 'end time',
            'category' => 'event category',
            'date' => 'event date'


        ];
    }

}