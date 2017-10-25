<?php

namespace backend\controllers;

use backend\BLL\Services\TourTypeService;
use backend\DAL\Interfaces\NotFoundException;
use backend\models\TourTypeForm;
use SebastianBergmann\GlobalState\RuntimeException;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class TourtypeController extends Controller
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

    private $service;

    public function __construct($id, $module, TourTypeService $service, array $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $tourTypeForm = new TourTypeForm();
        if ($tourTypeForm->load(\Yii::$app->request->post()) && $tourTypeForm->validate()) {
            try {
                $tourTypeForm->icon = UploadedFile::getInstance($tourTypeForm, 'icon');
                $type = $this->service->create($tourTypeForm->getDTO());
                if ($tourTypeForm->icon) {
                    $name = microtime(true) . $tourTypeForm->icon->baseName . '.' . $tourTypeForm->icon->extension;
                    $tourTypeForm->icon->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $type->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                \Yii::$app->session->setFlash('success', 'Tour type is created.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        return $this->render('create', [
            'model' => $tourTypeForm,
        ]);
    }

    public function actionUpdate($id)
    {
        $tourTypeForm = new TourTypeForm();
        $type = $this->service->get($id);
        $tourTypeForm->setDTO($type);
        if ($tourTypeForm->load(\Yii::$app->request->post()) && $tourTypeForm->validate()) {
            try {
                $icon = UploadedFile::getInstance($tourTypeForm, 'icon');
                if ($icon) {
                    if ($tourTypeForm->icon)
                        $type->removeImage($type->getImage());
                    $tourTypeForm->icon = $icon;
                    $name = microtime(true) . $tourTypeForm->icon->baseName . '.' . $tourTypeForm->icon->extension;
                    $tourTypeForm->icon->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $type->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                $this->service->update($tourTypeForm->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Tour type is updated.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        $tourTypeForm->icon = $type->getImage()->getUrl('300x175');
        return $this->render('update', [
            'model' => $tourTypeForm,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'delete tour type failed!');
        }
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $tourtype = null;
        try {
            $tourtype = $this->service->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tourtype/create']);
        }
        return $this->render('index', ['model' => $tourtype]);
    }
}