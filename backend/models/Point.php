<?php

namespace backend\models;

use Yii;
use yii\web\Linkable;


/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $panorama
 * @property string $descriptionPoint
 * @property string $shortDescriptionPoint
 * @property float rate
 * @property string $latitude
 * @property string $longtitude
 */
class Point extends \yii\db\ActiveRecord implements Linkable
{

    public $category;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            'panorama' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'point';
    }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getImageName()
    {
        return $this->image;
    }

    public function setImageName($image)
    {
        $this->image = $image;
    }

    public function getPanoramaName()
    {
        return $this->panorama;
    }

    public function setPanoramaName($panorama)
    {
        $this->panorama = $panorama;
    }

    /**
     * @return string
     */
    public function getDescriptionPoint(): string
    {
        return $this->descriptionPoint;
    }

    /**
     * @param string $descriptionPoint
     */
    public function setDescriptionPoint(string $descriptionPoint)
    {
        $this->descriptionPoint = $descriptionPoint;
    }

    /**
     * @return string
     */
    public function getShortDescriptionPoint(): string
    {
        return $this->shortDescriptionPoint;
    }

    /**
     * @param string $shortDescriptionPoint
     */
    public function setShortDescriptionPoint(string $shortDescriptionPoint)
    {
        $this->shortDescriptionPoint = $shortDescriptionPoint;
    }


    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongtitude(): string
    {
        return $this->longtitude;
    }

    /**
     * @param string $longtitude
     */
    public function setLongtitude(string $longtitude)
    {
        $this->longtitude = $longtitude;
    }

    public function getCategory()
    {
        return PointCategory::find()->select(['point_category.id', 'point_category.name'])->innerJoin(PointCategories::tableName(), 'point_category.id=point_categories.id_pointcategory')->where(['point_categories.id_point' => $this->getId()])->all();
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            'self' => '/index.php?r=point%2Fview&id=' . $this->getId(),
        ];
    }

    public function fields()
    {
        $fields=parent::fields();
        $fields[]='category';
        return $fields;
    }


    public function beforeDelete()
    {
        $this->removeImages();
        return parent::beforeDelete();
    }

    public function beforeSave($insert)
    {
        if($this->isAttributeChanged('image'))
        {
            if (!$this->isNewRecord) $this->removeImage($this->getImageByName($this->oldAttributes['image']));
            $this->image->name = uniqid('i_') . '.' . $this->image->extension;
        }
        if($this->isAttributeChanged('panorama'))
        {
            if (!$this->isNewRecord) $this->removeImage($this->getImageByName($this->oldAttributes['panorama']));
            $this->panorama->name = uniqid('p_') . '.' . $this->panorama->extension;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        try {
            if(array_key_exists('image', $changedAttributes))
            {
                if ($this->image)
                {
                    $path = Yii::getAlias('@upload/files/') . $this->image->name;
                    $this->image->saveAs($path);
                    $this->attachImage($path, false, $this->image->name);
                    @unlink($path);
                }
            }
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }
        try {
            if(array_key_exists('panorama', $changedAttributes))
            {
                if ($this->panorama)
                {
                    $path = Yii::getAlias('@upload/files/') . $this->panorama->name;
                    $this->panorama->saveAs($path);
                    $this->attachImage($path, false, $this->panorama->name);
                    @unlink($path);
                }
            }
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }
        parent::afterSave($insert, $changedAttributes);
    }

}
