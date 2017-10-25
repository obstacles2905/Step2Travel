<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Event controller
 */
class EventController extends Controller
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
     * Displays events page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays event page
     *
     * @param $id
     * @return mixed
     */
    public function actionEvent($id)
    {
        return $this->render('event', ['event' => $id]);
    }
}
