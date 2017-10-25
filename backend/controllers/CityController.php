<?php

namespace backend\controllers;

use backend\BLL\Services\CityService;

use backend\models\CityForm;
use Yii;

use yii\web\Controller;
use yii\web\UploadedFile;
use backend\DAL\Interfaces\NotFoundException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class CityController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['viewAdmin'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    private $cityService;

    public function __construct($id, $module, CityService $cityService, array $config = [])
    {
        $this->cityService = $cityService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $form = new CityForm();
        $city = null;
        try {
            $city = $this->cityService->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['city/create']);
        }
        return $this->render('index', ['model' => $city]);
    }

    public function actionCreate()
    {
        $model = new CityForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            try {
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->panorama = UploadedFile::getInstance($model, 'panorama');
                $city = $this->cityService->create($model->getDTO());

                if ($model->image) {
                    $path = Yii::getAlias('@upload/files/') . $model->image->baseName . '.' . $model->image->extension;
                    $model->image->saveAs($path);
                    $city->attachImage($path, false, $model->image->baseName . '.' . $model->image->extension);
                }
                if ($model->panorama) {
                    $path = Yii::getAlias('@upload/files/') . $model->panorama->baseName . '.' . $model->panorama->extension;
                    $model->panorama->saveAs($path);
                    $city->attachImage($path, false, $model->panorama->baseName . '.' . $model->panorama->extension);
                }

                \Yii::$app->session->setFlash('success', 'City is created.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', Yii::t('errors', $e->getMessage()));
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new CityForm();
        $city = $this->cityService->get($id);
        $model->setDTO($city);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            try {
                $image = UploadedFile::getInstance($model, 'image');
                $panorama = UploadedFile::getInstance($model, 'panorama');

                if ($image) {
                    if ($model->image)
                        $city->removeImage($city->getImageByName($model->image));
                    $model->image = $image;
                    $path = Yii::getAlias('@upload/files/') . $model->image->baseName . '.' . $model->image->extension;
                    $model->image->saveAs($path);
                    $city->attachImage($path, false, $model->image->baseName . '.' . $model->image->extension);
                }

                if ($panorama) {
                    if ($model->panorama)
                        $city->removeImage($city->getImageByName($model->panorama));
                    $model->panorama = $panorama;
                    $path = Yii::getAlias('@upload/files/') . $model->panorama->baseName . '.' . $model->panorama->extension;
                    $model->panorama->saveAs($path);
                    $city->attachImage($path, false, $model->panorama->baseName . '.' . $model->panorama->extension);
                }
                $this->cityService->update($model->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'City is updated.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', Yii::t('errors', $e->getMessage()));
            }
        }
        $model->image = $city->getImageByName($city->image)->getUrl('300x175');
        $model->panorama = $city->getImageByName($city->panorama)->getUrl('300x175');
        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        try {
            $this->cityService->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'at least one city required');
        }
        return $this->redirect(['index']);
    }
}