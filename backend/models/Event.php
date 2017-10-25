<?php

namespace backend\models;

use backend\DAL\Interfaces\NotFoundException;
use yii\web\Linkable;


/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city
 * @property string $image
 * @property string $descriptionEvent
 * @property string $date
 * @property string $latitude
 * @property string $longtitude
 * @property string $begin
 * @property string $end
 * @property integer $category
 */
class Event extends \yii\db\ActiveRecord implements Linkable
{
    public $month;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCity(): City
    {
        if (!$city = City::findOne($this->city)) {
            throw new NotFoundException("Related city has been deleted! Please, select new");
        }
        return $city;
    }

    /**
     * @param string $city
     */
    public function setCity(int $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getImageName(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImageName(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescriptionEvent(): string
    {
        return $this->descriptionEvent;
    }

    /**
     * @param string $descriptionEvent
     */
    public function setDescriptionEvent(string $descriptionEvent)
    {
        $this->descriptionEvent = $descriptionEvent;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongtitude(): string
    {
        return $this->longtitude;
    }

    /**
     * @param string $longtitude
     */
    public function setLongtitude(string $longtitude)
    {
        $this->longtitude = $longtitude;
    }

    /**
     * @return string
     */
    public function getBegin(): string
    {
        return $this->begin;
    }

    /**
     * @param string $begin
     */
    public function setBegin(string $begin)
    {
        $this->begin = $begin;
    }

    /**
     * @return string
     */
    public function getEnd(): string
    {
        return $this->end;
    }

    /**
     * @param string $begin
     */
    public function setEnd(string $end)
    {
        $this->end = $end;
    }


    public function getCategoryFull()
    {

        if (!$category = EventCategory::findOne($this->getCategory())) {
            throw new NotFoundException("Related category has been deleted! Please, select new");

        }
        return $category;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(int $category)
    {
        $this->category = $category;
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            'self' => '/index.php?r=event%2Fview&id=' . $this->getId(),
        ];
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'month';
        return $fields;
    }


    public function extraFields()
    {
        return ['month'];
    }
}
