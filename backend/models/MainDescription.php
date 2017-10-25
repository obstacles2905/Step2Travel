<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 11:25
 */

namespace backend\models;


use yii\db\ActiveRecord;


class MainDescription extends ActiveRecord
{

    public function getShow()
    {
        return $this->show;
    }

    public function setShow($isShow)
    {
        $this->show = $isShow;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getIntroText()
    {
        return $this->introText;
    }

    /**
     * @param mixed $introTex
     */
    public function setIntroText($introText)
    {
        if ($introText == null)
            throw new \DomainException('Introduction text can\'t be empty');
        $this->introText = $introText;
    }

    /**
     * @return mixed
     */
    public function getVideoURL()
    {
        return $this->videoURL;
    }

    /**
     * @param mixed $videoURL
     */
    public function setVideoURL($videoURL)
    {
        if ($videoURL == null)
            throw new \DomainException('You have to add video!');
        $this->videoURL = $videoURL;
    }

    /**
     * @return mixed
     */
    public function getVideoText()
    {
        return $this->videoText;
    }

    /**
     * @param mixed $videoText
     */
    public function setVideoText($videoText)
    {
        if ($videoText == null)
            throw new \DomainException('You have to add text description to video');
        $this->videoText = $videoText;
    }

    public static function tableName()
    {
        return 'maindescription';
    }


}
