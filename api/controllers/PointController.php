<?php

namespace api\controllers;

use backend\BLL\Services\PointCategoryService;
use backend\BLL\Services\PointService;
use yii\rest\Controller;

/**
 * Site controller
 */
class PointController extends Controller
{

    private $servicePoint;
    private $servicePointCategory;

    public function __construct($id, $module, PointService $servicePoint, PointCategoryService $servicePointCategory, array $config = [])
    {
        $this->servicePoint = $servicePoint;
        $this->servicePointCategory = $servicePointCategory;
        parent::__construct($id, $module, $config);
    }


    protected function verbs()
    {
        return [
            'all','point' => [
                'get'
            ]
        ];
    }



    public function actionAll()
    {

        return $this->servicePoint->getAllApi();
    }

    public function actionView($id)
    {
        return $this->servicePoint->getOneApi($id);
    }

    public function actionCategories()
    {
        return $this->servicePointCategory->getAllApi();
    }

    public static function allowedDomains()
    {
        return [
            '*',                        // star allows all domains
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }
}
