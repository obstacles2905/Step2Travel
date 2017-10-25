<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 26.07.2017
 * Time: 13:31
 */

namespace backend\models;

use yii\db\ActiveRecord;
/**
 * This is the model class for table "point_categories".
 *
 * @property integer $id
 * @property integer $id_cafe
 * @property integer $id_cafetype
 */
class CafeTypes extends ActiveRecord
{
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
     * @return int
     */
    public function getIdCafe(): int
    {
        return $this->id_cafe;
    }

    /**
     * @param int $id_cafe
     */
    public function setIdCafe(int $id_cafe)
    {
        $this->id_cafe = $id_cafe;
    }

    /**
     * @return int
     */
    public function getIdCafetype(): int
    {
        return $this->id_cafetype;
    }

    /**
     * @param int $id_cafetype
     */
    public function setIdCafetype(int $id_cafetype)
    {
        $this->id_cafetype = $id_cafetype;
    }

    public static function tableName()
    {
        return 'cafe_types';
    }
}