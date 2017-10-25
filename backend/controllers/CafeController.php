<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:42
 */

namespace backend\controllers;
use backend\BLL\Services\CafeService;
use backend\BLL\Services\CafeTypeService;
use backend\DAL\Interfaces\NotFoundException;
use Yii;
use yii\filters\AccessControl;
use backend\models\CafeForm;
use SebastianBergmann\GlobalState\RuntimeException;
use yii\filters\VerbFilter;

use yii\helpers\BaseFileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;

class CafeController extends Controller
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

    public function __construct($id, $module, CafeService $service, CafeTypeService $category, array $config = [])
    {
        $this->service = $service;
        $this->category = $category;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $form_main = new CafeForm();
        $categories = null;
        try {
            $categories = $this->category->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['cafetype/create']);
        }
        if ($form_main->load(\Yii::$app->request->post()))
        {
            $form_main->rate = rand(10, 50) / 10;
            $form_main->image = UploadedFile::getInstance($form_main, 'image');
            if ($form_main->validate()) {
                try {
                    $form_main->tour3d = UploadedFile::getInstance($form_main, 'tour3d');
                    $this->service->create($form_main->getDTO());
                    \Yii::$app->session->setFlash('success', 'Cafe is created.');
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

        $form_main = new CafeForm();
        $cafe = $this->service->get($id);
        $form_main->setDTO($cafe);
        $oldImage = $form_main->image;
        $oldTour3d = $form_main->tour3d;
        if ($form_main->load(\Yii::$app->request->post()))
        {
            $image = UploadedFile::getInstance($form_main, 'image');
            if($image)
                $form_main->image = $image;
            else
                $form_main->image = $oldImage;
            $form_main->tour3d = UploadedFile::getInstance($form_main, 'tour3d');
            if ($form_main->validate()) {
                try {
                    if ($form_main->tour3d) {
                        if ($oldTour3d) BaseFileHelper::removeDirectory(Yii::getAlias('@upload/tour3d/cafes/') . $oldTour3d);
                    }
                    else
                    {
                        $form_main->tour3d = $oldTour3d;
                    }
                    $this->service->update($form_main->getDTO(), $id);
                    \Yii::$app->session->setFlash('success', 'Cafe is updated.');
                    return $this->redirect(['index']);
                } catch (\Exception $e) {
                    \Yii::$app->errorHandler->logException($e);
                    \Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }
        $form_main->image = $cafe->getImage()->getUrl('300x175');
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
            \Yii::$app->session->setFlash('error', 'delete cafe failed!');
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
            return $this->redirect(['cafe/create']);
        }
        return $this->render('index', ['model' => $point]);
    }

}