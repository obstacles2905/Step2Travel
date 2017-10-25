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
 * @property integer $id_point
 * @property integer $id_pointcategory
 */
class PointCategories extends ActiveRecord
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
    public function getIdPoint(): int
    {
        return $this->id_point;
    }

    /**
     * @param int $id_point
     */
    public function setIdPoint(int $id_point)
    {
        $this->id_point = $id_point;
    }

    /**
     * @return int
     */
    public function getIdPointcategory(): int
    {
        return $this->id_pointcategory;
    }

    /**
     * @param int $id_pointcategory
     */
    public function setIdPointcategory(int $id_pointcategory)
    {
        $this->id_pointcategory = $id_pointcategory;
    }

    public static function tableName()
    {
        return 'point_categories';
    }
}