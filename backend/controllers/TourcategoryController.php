<?php

namespace backend\controllers;

use backend\BLL\Services\TourCategoryService;
use backend\DAL\Interfaces\NotFoundException;
use backend\models\TourCategoryForm;
use SebastianBergmann\GlobalState\RuntimeException;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class TourcategoryController extends Controller
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

    public function __construct($id, $module, TourCategoryService $service, array $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $tourCategoryForm = new TourCategoryForm();
        if ($tourCategoryForm->load(\Yii::$app->request->post()) && $tourCategoryForm->validate()) {
            try {
                $tourCategoryForm->icon = UploadedFile::getInstance($tourCategoryForm, 'icon');
                $category = $this->service->create($tourCategoryForm->getDTO());
                if ($tourCategoryForm->icon) {
                    $name = microtime(true) . $tourCategoryForm->icon->baseName . '.' . $tourCategoryForm->icon->extension;
                    $tourCategoryForm->icon->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $category->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                \Yii::$app->session->setFlash('success', 'Tour category is created.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        return $this->render('create', [
            'model' => $tourCategoryForm,
        ]);
    }

    public function actionUpdate($id)
    {
        $tourCategoryForm = new TourCategoryForm();
        $category = $this->service->get($id);
        $tourCategoryForm->setDTO($category);
        if ($tourCategoryForm->load(\Yii::$app->request->post()) && $tourCategoryForm->validate()) {
            try {
                $icon = UploadedFile::getInstance($tourCategoryForm, 'icon');
                if ($icon) {
                    if ($tourCategoryForm->icon)
                        $category->removeImage($category->getImage());
                    $tourCategoryForm->icon = $icon;
                    $name = microtime(true) . $tourCategoryForm->icon->baseName . '.' . $tourCategoryForm->icon->extension;
                    $tourCategoryForm->icon->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $category->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                $this->service->update($tourCategoryForm->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Tour category is updated.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        $tourCategoryForm->icon = $category->getImage()->getUrl('300x175');
        return $this->render('update', [
            'model' => $tourCategoryForm,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'delete tour category failed!');
        }
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $tourCategory = null;
        try {
            $tourCategory = $this->service->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tourcategory/create']);
        }
        return $this->render('index', ['model' => $tourCategory]);
    }
}