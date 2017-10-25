<?php

namespace backend\models;
use Yii;
use yii\helpers\BaseFileHelper;

/**
 * This is the model class for table "cafe".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $descriptionCafe
 * @property double $rate
 * @property string $latitude
 * @property string $longtitude
 * @property string $tour3d
 */
class Cafe extends BasePlace
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->descriptionCafe;
    }

    /**
     * @param string $descriptionCafe
     */
    public function setDescription(string $descriptionCafe)
    {
        $this->descriptionCafe = $descriptionCafe;
    }

    public static function tableName()
    {
        return 'cafe';
    }

    public function getCategory()
    {
        return CafeType::find()->select(['cafe_type.id', 'cafe_type.name'])->innerJoin(CafeTypes::tableName(), 'cafe_type.id=cafe_types.id_cafetype')->where(['cafe_types.id_cafe' => $this->getId()])->all();
    }

    public function getLinks()
    {
        return [
            'self' => '/index.php?r=cafe%2Fview&id=' . $this->getId(),
        ];
    }

    public function beforeDelete()
    {
        $this->removeImages();
        if ($this->getTour3d())
            BaseFileHelper::removeDirectory(Yii::getAlias('@upload/tour3d/cafes/') . $this->getTour3d());
        return parent::beforeDelete();
    }

    public function beforeSave($insert)
    {
        try {
            if ($this->getTour3d() && !file_exists(Yii::getAlias('@upload/tour3d/cafes/') . $this->getTour3d()))
            {
                $nameDir = uniqid("cafe_");
                $path = Yii::getAlias('@upload/files/') . $nameDir;
                $this->tour3d->saveAs($path, true);
                $pathToExtracted = Yii::getAlias('@upload/tour3d/cafes/') . $nameDir;
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
