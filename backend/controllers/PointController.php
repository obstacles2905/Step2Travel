<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:42
 */

namespace backend\controllers;

use backend\BLL\Services\PointCategoryService;
use backend\BLL\Services\PointService;
use backend\DAL\Interfaces\NotFoundException;
use Yii;
use yii\filters\AccessControl;
use backend\models\PointForm;
use SebastianBergmann\GlobalState\RuntimeException;

use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\web\UploadedFile;

class PointController extends Controller
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
    private $category;

    public function __construct($id, $module, PointService $service, PointCategoryService $category, array $config = [])
    {
        $this->service = $service;
        $this->category = $category;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $form_main = new PointForm();
        $categories = null;
        try {
            $categories = $this->category->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['pointcategory/create']);
        }
        if ($form_main->load(\Yii::$app->request->post()))
        {
            $form_main->rate = rand(10, 50) / 10;
            if ($form_main->validate()) {
                try {
                    $form_main->image = UploadedFile::getInstance($form_main, 'image');
                    $form_main->panorama = UploadedFile::getInstance($form_main, 'panorama');
                    $this->service->create($form_main->getDTO());
                    \Yii::$app->session->setFlash('success', 'Point is created.');
                    return $this->redirect(['index']);
                } catch (\Exception $e) {
                    \Yii::$app->errorHandler->logException($e);
                    \Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }
        return $this->render('create', [
            'form_main' => $form_main,
            'categories' => $categories,

        ]);
    }

    public function actionUpdate($id)
    {
        $form_main = new PointForm();
        $form_main->setDTO($this->service->get($id));
        if ($form_main->load(\Yii::$app->request->post()) && $form_main->validate()) {
            try {
                $image = UploadedFile::getInstance($form_main, 'image');
                $panorama = UploadedFile::getInstance($form_main, 'panorama');
                if($image)
                    $form_main->image = $image;
                if($panorama)
                    $form_main->panorama = $panorama;
                $this->service->update($form_main->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Point is updated.');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        $form_main->image = $this->service->getImage($id);
        $form_main->panorama = $this->service->getPanorama($id);
        return $this->render('update', [
            'form_main' => $form_main,
            'categories' => $this->category->getListAll(),
            ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'delete point failed!');
        }
        return $this->redirect(['index']);
    }


    public function actionIndex()
    {
        $point = null;
        try {
            $point = $this->service->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['point/create']);
        }
        return $this->render('index', ['model' => $point]);
    }

}