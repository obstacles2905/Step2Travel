<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:42
 */

namespace backend\controllers;
use backend\BLL\Services\HotelTypeService;
use backend\DAL\Interfaces\NotFoundException;
use backend\models\HotelForm;
use SebastianBergmann\GlobalState\RuntimeException;
use Yii;
use yii\filters\VerbFilter;
use backend\BLL\Services\HotelService;
use yii\helpers\BaseFileHelper;
use yii\validators\Validator;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class HotelController extends Controller
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

    public function __construct($id, $module, HotelService $service, HotelTypeService $category, array $config = [])
    {
        $this->service = $service;
        $this->category = $category;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $form_main = new HotelForm();
        $categories = null;
        try {
            $categories = $this->category->getListAll();
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['hoteltype/create']);
        }
        if ($form_main->load(\Yii::$app->request->post()))
        {
            $form_main->rate = rand(10, 50) / 10;
            $form_main->image = UploadedFile::getInstance($form_main, 'image');
            if($form_main->validate()) {
                try {
                    $form_main->tour3d = UploadedFile::getInstance($form_main, 'tour3d');
                    $this->service->create($form_main->getDTO());
                    \Yii::$app->session->setFlash('success', 'Hotel is created.');
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
        $form_main = new HotelForm();
        $hotel = $this->service->get($id);
        $form_main->setDTO($hotel);
        $oldImage = $form_main->image;
        $oldTour3d = $form_main->tour3d;
        if ($form_main->load(\Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($form_main, 'image');
            if($image)
                $form_main->image = $image;
            else
                $form_main->image = $oldImage;
            $form_main->tour3d = UploadedFile::getInstance($form_main, 'tour3d');
            if ($form_main->validate()) {
                try {
                    if ($form_main->tour3d) {
                        if ($oldTour3d) BaseFileHelper::removeDirectory(Yii::getAlias('@upload/tour3d/hotels/') . $oldTour3d);
                    }
                    else
                    {
                        $form_main->tour3d = $oldTour3d;
                    }
                    $this->service->update($form_main->getDTO(), $id);
                    \Yii::$app->session->setFlash('success', 'Hotel is updated.');
                    return $this->redirect(['index']);
                } catch (\Exception $e) {
                    \Yii::$app->errorHandler->logException($e);
                    \Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }
        $form_main->image = $hotel->getImage()->getUrl('300x175');
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
            \Yii::$app->session->setFlash('error', 'delete hotel failed!');
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
            return $this->redirect(['hotel/create']);
        }
        return $this->render('index', ['model' => $point]);
    }

}