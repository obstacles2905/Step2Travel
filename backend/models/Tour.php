<?php

namespace backend\models;

use backend\DAL\Interfaces\NotFoundException;
use yii\helpers\BaseFileHelper;
use yii\web\Linkable;
use Yii;

/**
 * This is the model class for table "tour".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city
 * @property integer $type
 * @property integer $category
 * @property string $description
 * @property string $image
 * @property double $rate
 * @property double $tour3d
 */
class Tour extends \yii\db\ActiveRecord implements Linkable
{
    public $points;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
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
    public function setId(string $id)
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

    /**
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param int $city
     */
    public function setCity(int $city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return
     */
    public function getImageName()
    {
        return $this->image;
    }

    /**
     * @param $image
     */
    public function setImageName($image)
    {
        $this->image = $image;
    }

    /**
     * @return double
     */
    public function getRate(): string
    {
        return doubleval($this->rate);
    }

    /**
     * @param string $rate
     */
    public function setRate(string $rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return City
     */
    public function getCityFull(): City
    {
        if (!$city = City::findOne($this->city)) {
            throw new NotFoundException("Related city has been deleted! Please, select new");
        }
        $city->image = Yii::getAlias('@server') . $city->getImageByName($city->getImageName())->getUrl('300x200');
        return $city;
    }
    
    public function getCategoryFull(): TourCategory
    {
        if (!$category = TourCategory::findOne($this->getCategory())) {
            throw new NotFoundException("Related category has been deleted! Please, select new");
        }
        return $category;
    }

    public function getTypeFull(): TourType
    {
        if (!$type = TourType::findOne($this->getType())) {
            throw new NotFoundException("Related type has been deleted! Please, select new");
        }
        return $type;
    }

    public function getPointsFull()
    {
        if (!$points = TourPoint::findAll(['idTour' => $this->getId()])) {
            throw new NotFoundException("Related points has been deleted! Please, select new");
        }
        $pointsInfo = [];
        foreach ($points as $point)
        {
            $info = null;
            if(!$info = Point::findAll(['id' => $point->getIdPoint()])) {
                throw new NotFoundException("Related points has been deleted! Please, select new");
            }
            $pointsInfo[] = $info;
        }
        return $pointsInfo;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'points';
        return $fields;
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
            'self'=>'/index.php?r=tour%2Fview&id=' . $this->getId(),
        ];
    }

    public function getPoints()
    {
        $points = Point::find()->select(['point.id', 'point.name', 'point.image', 'point.panorama',
            'point.descriptionPoint', 'point.shortDescriptionPoint', 'point.rate', 'point.latitude',
            'point.longtitude'])->innerJoin(TourPoint::tableName(), 'point.id=tourpoint.idPoint')
            ->where(['tourpoint.idTour' => $this->getId()])->all();
        foreach ($points as $point) {
            $point->category = PointCategory::find()->select(['point_category.id', 'point_category.name'])
                ->innerJoin(PointCategories::tableName(), 'point_category.id=point_categories.id_pointcategory')
                ->where(['point_categories.id_point' => $point->id])->one();
        }
        foreach ($points as $point) {
            $point['image'] = Yii::getAlias('@server') . $point->getImageByName($point->getImageName())->getUrl('1920x1080');
            $point['panorama'] = Yii::getAlias('@server') . $point->getImageByName($point->getPanoramaName())->getUrl();
        }
        return $points;
    }

    public function getTour3d()
    {
        return $this->tour3d;
    }

    public function setTour3d($tour3d)
    {
        $this->tour3d = $tour3d;
    }

    public function beforeDelete()
    {
        $this->removeImages();
        $path = Yii::getAlias('@upload/tour3d/tours/') . $this->getTour3d();
        BaseFileHelper::removeDirectory($path);
        return parent::beforeDelete();
    }

    public function beforeSave($insert)
    {
        try {
            if ($this->getTour3d() && !file_exists(Yii::getAlias('@upload/tour3d/tours/') . $this->getTour3d()))
            {
                $nameDir = uniqid("tour_");
                $path = Yii::getAlias('@upload/files/') . $nameDir;
                $this->tour3d->saveAs($path, true);
                $pathToExtracted = Yii::getAlias('@upload/tour3d/tours/') . $nameDir;
                BaseFileHelper::createDirectory(dirname($pathToExtracted), 0777, true);
                $this->unZip($path , $pathToExtracted);
                $this->setTour3d($nameDir);
            }
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }

        if($this->isAttributeChanged('image'))
        {
            $this->image->name = uniqid('i_') . '.' . $this->image->extension;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        try {
            if(array_key_exists('image', $changedAttributes))
            {
                $this->removeImages();
                $path = Yii::getAlias('@upload/files/') . $this->image->name;
                $this->image->saveAs($path);
                $this->attachImage($path, false, $this->image->name);
                @unlink($path);
            }
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function unZip($pathToZip, $pathToExtracted)
    {
        $zip = new \ZipArchive();

        if($zip->open($pathToZip) != true)
        {
            return \ZipArchive::ER_OPEN;
        }
        $zip->extractTo($pathToExtracted);
        $zip->close();
        unlink($pathToZip);

        return 0;
    }
}
