<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:45
 */

namespace backend\models;


use backend\BLL\DTO\MainDescriptionDTO;
use yii\base\Model;

class MainDescriptionForm extends Model
{

    public $id;
    public $introText;
    public $videoURL;
    public $videoText;
    public $show;

    public function rules()
    {
        return [
            [
                ['introText', 'videoURL', 'videoText'], 'required'],
            ['show', 'boolean']

        ];
    }

    public function getDTO()
    {
        $dto = new MainDescriptionDTO();
        $dto->id = $this->id;
        $dto->introText = $this->introText;
        $dto->videoURL = $this->videoURL;
        $dto->videoText = $this->videoText;
        $dto->show = $this->show;
        return $dto;
    }

    public function setDTO(MainDescription $origin)
    {

        $this->id = $origin->getId();
        $this->introText = $origin->getIntroText();
        $this->videoText = $origin->getVideoText();
        $this->videoURL = $origin->getVideoURL();
        $this->show = $origin->getShow();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'introText' => 'Intro',
            'videoURL' => 'url',
            'videoText' => 'text',
            'show' => 'show'
        ];
    }

}