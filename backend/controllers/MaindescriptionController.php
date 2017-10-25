<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 20.07.2017
 * Time: 14:42
 */

namespace backend\controllers;


use backend\BLL\Services\MainDescriptionService;
use backend\DAL\Interfaces\NotFoundException;
use SebastianBergmann\GlobalState\RuntimeException;
use yii\filters\VerbFilter;
use backend\models\MainDescriptionForm;
use yii\web\Controller;
use yii\filters\AccessControl;

class MaindescriptionController extends Controller
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

    public function __construct($id, $module, MainDescriptionService $service, array $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $form_main = new MainDescriptionForm();
        if ($form_main->load(\Yii::$app->request->post()) && $form_main->validate()) {
            try {

                $this->service->create($form_main->getDTO());
                \Yii::$app->session->setFlash('success', 'Description is created.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        return $this->render('create', [
            'form_main' => $form_main,
        ]);
    }

    public function actionUpdate($id)
    {

        $form_main = new MainDescriptionForm();
        $form_main->setDTO($this->service->get($id));
        if ($form_main->load(\Yii::$app->request->post()) && $form_main->validate()) {
            try {
                $this->service->update($form_main->getDTO(), $id);
                \Yii::$app->session->setFlash('success', 'Description is updated.');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', \Yii::t('errors', $e->getMessage()));
            }
        }
        return $this->render('update', [
            'form_main' => $form_main,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            \Yii::$app->session->setFlash('error', 'at least one displayed column required');
        }
        return $this->redirect(['index']);
    }


    public function actionIndex()
    {
        $main = null;
        try {
            $main = $this->service->getAll();
        } catch (NotFoundException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['maindescription/create']);
        }
        return $this->render('index', ['model' => $main]);
    }

}