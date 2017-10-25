<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:42
 */

namespace backend\controllers;


use backend\BLL\Services\CityService;
use backend\BLL\Services\EventCategoryService;
use backend\BLL\Services\EventService;
use backend\DAL\Interfaces\NotFoundException;
use Yii;
use yii\filters\AccessControl;
use backend\models\EventForm;
use SebastianBergmann\GlobalState\RuntimeException;

use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\web\UploadedFile;

class EventController extends Controller
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
    private $city;

    public function __construct($id, $module, CityService $city, EventService $service, EventCategoryService $category, array $config = [])
    {
        $this->service = $service;
        $this->category = $category;
        $this->city = $city;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $form_main = new EventForm();
        $categories = null;
        try {
            $categories = $this->category->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['eventcategory/create']);
        }
        if ($form_main->load(\Yii::$app->request->post()) && $form_main->validate()) {
            try {
                $form_main->image = UploadedFile::getInstance($form_main, 'image');
                $event = $this->service->create($form_main->getDTO());
                if ($form_main->image) {
                    $name = microtime(true) . $form_main->image->baseName . '.' . $form_main->image->extension;
                    $form_main->image->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $event->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                \Yii::$app->session->setFlash('success', 'Event is created.');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'form_main' => $form_main,
            'categories' => $categories,
            'cities' => $this->city->getListAll()
        ]);
    }

    public function actionUpdate($id)
    {
        $form_main = new EventForm();
        $event = $this->service->get($id);
        $form_main->setDTO($event);
        if ($form_main->load(\Yii::$app->request->post()) && $form_main->validate()) {
            try {
                $image = UploadedFile::getInstance($form_main, 'image');
                if ($image) {
                    if ($form_main->image)
                        $event->removeImage($event->getImage());
                    $form_main->image = $image;
                    $name = microtime(true) . $form_main->image->baseName . '.' . $form_main->image->extension;
                    $form_main->image->saveAs(Yii::getAlias('@upload/files/') . $name);
                    $event->attachImage(Yii::getAlias('@upload/files/') . $name, false, $name);
                }
                $this->service->update($form_main->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Event is updated.');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        $form_main->image = $event->getImage()->getUrl('300x175');
        return $this->render('update', [
            'form_main' => $form_main,
            'categories' => $this->category->getListAll(),
            'cities' => $this->city->getListAll()
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'delete event failed!');
        }
        return $this->redirect(['index']);
    }


    public function actionIndex()
    {
        $category = null;
        try {
            $category = $this->service->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['event/create']);
        }
        return $this->render('index', ['model' => $category]);
    }

}