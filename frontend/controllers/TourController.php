<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Tour controller
 */
class TourController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays tours page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays tour page
     *
     * @param $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', ['tour' => $id]);
    }
}
