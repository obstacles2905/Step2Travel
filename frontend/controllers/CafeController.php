<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Cafe controller
 */
class CafeController extends Controller
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
     * Displays event page
     *
     * @param $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', ['cafe' => $id]);
    }
}
