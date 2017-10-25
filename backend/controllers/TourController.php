<?php

namespace backend\controllers;

use backend\BLL\Services\CityService;
use backend\BLL\Services\PointService;
use backend\BLL\Services\TourCategoryService;
use backend\BLL\Services\TourTypeService;
use backend\BLL\Services\TourService;
use backend\DAL\Interfaces\NotFoundException;
use Yii;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use backend\models\TourForm;
use SebastianBergmann\GlobalState\RuntimeException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;

class TourController extends Controller
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
    private $city;
    private $points;
    private $type;
    private $category;

    public function __construct($id, $module, TourService $service, PointService $points, CityService $city, TourTypeService $type,
                                TourCategoryService $category, array $config = [])
    {
        $this->service = $service;
        $this->city = $city;
        $this->points = $points;
        $this->type = $type;
        $this->category = $category;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $tourForm = new TourForm();
        $cities = null;
        $points = null;
        $types = null;
        $categories = null;
        try {
            $cities = $this->city->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['city/create']);
        }
        try {
            $points = $this->points->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['point/create']);
        }
        try {
            $types = $this->type->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tourtype/create']);
        }
        try {
            $categories = $this->category->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tourcategory/create']);
        }
        if ($tourForm->load(\Yii::$app->request->post()))
        {
            $tourForm->rate = rand(10, 50) / 10;
            if ($tourForm->validate()) {
                try {
                    $tourForm->image = UploadedFile::getInstance($tourForm, 'image');
                    $tourForm->tour3d = UploadedFile::getInstance($tourForm, 'tour3d');
                    $this->service->create($tourForm->getDTO());
                    \Yii::$app->session->setFlash('success', 'Tour is created.');
                    return $this->redirect(['index']);
                } catch (\Exception $e) {
                    \Yii::$app->errorHandler->logException($e);
                    \Yii::$app->session->setFlash('error',  $e->getMessage());
                }
            }
        }
        return $this->render('create', [
            'tourForm' => $tourForm,
            'cities'=> $cities,
            'points'=> $points,
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    public function actionUpdate($id)
    {
        $tourForm = new TourForm();
        $tourForm->setDTO($this->service->get($id));
        if ($tourForm->load(\Yii::$app->request->post()) && $tourForm->validate()) {
            try {
                $image = UploadedFile::getInstance($tourForm, 'image');
                $tour3d = UploadedFile::getInstance($tourForm, 'tour3d');
                if($image)
                    $tourForm->image = $image;
                if($tour3d)
                {
                    BaseFileHelper::removeDirectory(Yii::getAlias('@upload/tour3d/tours/') . $tourForm->tour3d);
                    $tourForm->tour3d = $tour3d;
                }
                $this->service->update($tourForm->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Tour is updated.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        $tourForm->image = $this->service->getImage($id);
        return $this->render('update', [
            'tourForm' => $tourForm,
            'cities'=> $this->city->getListAll(),
            'points'=> $this->points->getListAll(),
            'types' => $this->type->getListAll(),
            'categories' => $this->category->getListAll(),
        ]);
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'delete tour failed!');
        }
        return $this->redirect(['index']);
    }


    public function actionIndex()
    {
        $tour = null;
        try {
            $tour = $this->service->getAllApi();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tour/create']);
        }
        return $this->render('index', ['model' => $tour]);
    }

    public function actionView($id)
    {
        $tour = null;
        try {
            $tour = $this->service->getOneApi($id);
//            $tour->points = $tour->getPoints($id);
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['tour/index']);
        }
        return $this->render('view', ['model' => $tour]);
    }

}