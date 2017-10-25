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
 * @property integer $id_hotel
 * @property integer $id_hoteltype
 */
class HotelTypes extends ActiveRecord
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
    public function getIdHotel(): int
    {
        return $this->id_hotel;
    }

    /**
     * @param int $id_hotel
     */
    public function setIdHotel(int $id_hotel)
    {
        $this->id_hotel = $id_hotel;
    }

    /**
     * @return int
     */
    public function getIdHoteltype(): int
    {
        return $this->id_hoteltype;
    }

    /**
     * @param int $id_hoteltype
     */
    public function setIdHoteltype(int $id_hoteltype)
    {
        $this->id_hoteltype = $id_hoteltype;
    }


    public static function tableName()
    {
        return 'hotel_types';
    }
}