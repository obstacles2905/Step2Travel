<?php

namespace api\controllers;

use backend\BLL\Services\HotelTypeService;
use backend\BLL\Services\HotelService;
use yii\rest\Controller;

/**
 * Site controller
 */
class HotelController extends Controller
{

    private $service;
    private $serviceHotelType;

    public function __construct($id, $module, HotelService $service, HotelTypeService $serviceHotelType, array $config = [])
    {
        $this->service = $service;
        $this->serviceHotelType = $serviceHotelType;
        parent::__construct($id, $module, $config);
    }


    protected function verbs()
    {
        return [
            'all','hotel' => [
                'get'
            ]
        ];
    }




    public function actionView($id)
    {
        return $this->service->getOneApi($id);
    }

    public function actionAll()
    {
        return $this->service->getAllApi();
    }

    public function actionCategories()
    {
        return $this->serviceHotelType->getAllApi();
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
