<?php

namespace api\controllers;

use backend\BLL\Services\CafeService;

use backend\BLL\Services\CafeTypeService;
use yii\rest\Controller;

/**
 * Site controller
 */
class CafeController extends Controller
{

    private $cafeService;
    private $cafeTypeService;

    public function __construct($id, $module, CafeService $cafeService, CafeTypeService $cafeTypeService, array $config = [])
    {
        $this->cafeService = $cafeService;
        $this->cafeTypeService = $cafeTypeService;
        parent::__construct($id, $module, $config);
    }

    protected function verbs()
    {
        return [
            'all', 'cafe', 'categories' => [
                'get'
            ]
        ];
    }

    public function actionView($id)
    {
        return $this->cafeService->getOneApi($id);
    }

    public function actionAll()
    {
        return $this->cafeService->getAllApi();
    }

    public function actionCategories()
    {
        return $this->cafeTypeService->getAllApi();
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
