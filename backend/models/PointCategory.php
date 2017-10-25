<?php

namespace backend\models;


/**
 * This is the model class for table "ho".
 *
 * @property integer $id
 * @property string $name
 */
class PointCategory extends BaseCategory
{

    public static function tableName()
    {
        return 'point_category';
    }


}
