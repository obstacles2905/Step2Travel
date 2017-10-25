<?php

namespace backend\models;


/**
 * This is the model class for table "ho".
 *
 * @property integer $id
 * @property string $name
 */
class BaseCategory extends \yii\db\ActiveRecord
{
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
        $this->name = $name;
    }
    /**
     * @inheritdoc
     */



}
