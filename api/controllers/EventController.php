<?php

namespace api\controllers;

use backend\BLL\Services\EventCategoryService;
use backend\BLL\Services\EventService;
use yii\rest\Controller;

/**
 * Site controller
 */
class EventController extends Controller
{
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

    private $serviceEvent;
    private $serviceEventCategory;

    public function __construct($id, $module, EventService $service, EventCategoryService $serviceEventCategory, array $config = [])
    {
        $this->serviceEvent = $service;
        $this->serviceEventCategory = $serviceEventCategory;
        parent::__construct($id, $module, $config);
    }

    protected function verbs()
    {
        return [
            'all', 'carousel','index' => [
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
        return $this->serviceEvent->getAllApi();
    }

    public function actionCarousel($id_city)
    {

        return $this->serviceEvent->getCarousel($id_city);
    }

    public function actionView($id)
    {
        return $this->serviceEvent->getOneApi($id);
    }

    public function actionCategories()
    {
        return $this->serviceEventCategory->getAllApi();
    }
}
