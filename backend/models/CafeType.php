<?php

namespace backend\models;



/**
 * This is the model class for table "cafetype".
 *
 * @property integer $id
 * @property string $name
 */
class CafeType extends BaseCategory
{
    public static function tableName()
    {
        return 'cafe_type';
    }

}
