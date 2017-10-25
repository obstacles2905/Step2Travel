<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;



use yii\base\Model;


class BaseCategoryForm extends Model
{

    public $id;
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'],'string','max'=>20]

        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',

        ];
    }

}