<?php

namespace backend\models;

use yii\web\Linkable;

/**
 * This is the model class for table "cafe".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $tour3d
 * @property string $description
 * @property double $rate
 * @property string $latitude
 * @property string $longtitude
 */
class BasePlace extends \yii\db\ActiveRecord implements Linkable
{
    public $category;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
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
     * @return
     */
    public function getImageName()
    {
        return $this->image;
    }

    /**
     * @param $image
     */
    public function setImageName($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
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
     * @return
     */
    public function getTour3d()
    {
        return $this->tour3d;
    }

    /**
     * @param $tour3d
     */
    public function setTour3d($tour3d)
    {
        $this->tour3d = $tour3d;
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'category';
        return $fields;
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
        return [];
    }
}
