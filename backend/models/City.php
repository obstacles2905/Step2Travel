<?php

namespace backend\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $ip
 * @property string $name
 * @property string $descriptionCity
 * @property string $image
 * @property string $panorama
 */
class City extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            'panorama' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function rules()
    {
        return [
            [['ip', 'name', 'descriptionCity'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        if ($id == null)
            throw new \DomainException('Id can\'t be empty');
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        if ($ip == null)
            throw new \DomainException('Ip can\'t be empty');
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        if ($name == null)
            throw new \DomainException('You have to add name!');
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescriptionCity()
    {
        return $this->descriptionCity;
    }

    /**
     * @param string $descriptionCity
     */
    public function setDescriptionCity($descriptionCity)
    {
        if ($descriptionCity == null)
            throw new \DomainException('You have to add text description to city');
        $this->descriptionCity = $descriptionCity;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImageName($image)
    {
        if ($image == null)
            throw new \DomainException('Image can\'t be empty');
        $this->image = $image;
    }

    public static function tableName()
    {
        return 'city';
    }

    /**
     * @return array primary key of the table
     **/
    public static function primaryKey()
    {
        return array('id');
    }

    /**
     * @return string
     */
    public function getPanoramaName()
    {
        return $this->panorama;
    }

    /**
     * @param string $panorama
     */
    public function setPanoramaName($panorama)
    {
        $this->panorama = $panorama;
    }
}