<?php

namespace backend\models;


/**
 * This is the model class for table "hoteltype".
 *
 * @property integer $id
 * @property string $name
 */
class HotelType extends BaseCategory
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_type';
    }

}
