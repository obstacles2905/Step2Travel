<?php

namespace api\controllers;

use backend\BLL\Services\TourCategoryService;
use backend\BLL\Services\TourService;
use backend\BLL\Services\TourTypeService;
use yii\rest\Controller;

/**
 * Tour controller
 */
class TourController extends Controller
{
    private $tourService;
    private $tourTypeService;
    private $tourCategoryService;

    public function __construct($id, $module, TourService $tourService, TourTypeService $tourTypeService, TourCategoryService $tourCategoryService, array $config = [])
    {
        $this->tourService = $tourService;
        $this->tourTypeService = $tourTypeService;
        $this->tourCategoryService = $tourCategoryService;
        parent::__construct($id, $module, $config);
    }

    protected function verbs()
    {
        return [
            'all', 'view', 'categories', 'types' => [
                'get'
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return 'api';
    }

    public function actionAll()
    {
        return $this->tourService->getAllApi();
    }

    public function actionView($id)
    {
        return $this->tourService->getOneApi($id);
    }

    public function actionTypes()
    {
        return $this->tourTypeService->getAllApi();
    }

    public function actionCategories()
    {
        return $this->tourCategoryService->getAllApi();
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
