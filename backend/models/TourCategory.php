<?php

namespace backend\models;


/**
 * This is the model class for table "TourCategory".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 */
class TourCategory extends \yii\db\ActiveRecord
{
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
        if ($name == null)
            throw new \DomainException('Name can\'t be empty');
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon)
    {
        if ($icon == null)
            throw new \DomainException('Icon can\'t be empty');
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'tourcategory';
    }
}