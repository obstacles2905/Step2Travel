<?php

namespace backend\models;


/**
 * This is the model class for table "ho".
 *
 * @property integer $id
 * @property string $name
 */
class EventCategory extends BaseCategory
{
    public static function tableName()
    {
        return 'event_category';
    }


}
