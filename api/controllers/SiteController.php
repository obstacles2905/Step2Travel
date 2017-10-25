<?php

namespace api\controllers;
use backend\BLL\Services\CityService;
use backend\BLL\Services\MainDescriptionService;
use backend\DAL\Repositories\ARCityRepository;
use yii\rest\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    private $service;
    private $serviceCity;
    public $enableCsrfValidation = false;

    public function __construct($id, $module, MainDescriptionService $service, CityService $serviceCity, array $config = [])
    {
        $this->service = $service;
        $this->serviceCity = $serviceCity;
        parent::__construct($id, $module, $config);
    }

    protected function verbs()
    {
        return [
            'main', 'city','index' => [
                'get'
            ]
        ];
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
                    'Access-Control-Request-Method'    => ['POST', 'GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
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

    public function actionMain()
    {
        return $this->service->getSeen();
    }

    public function actionCity()
    {
        return $this->serviceCity->getFirstForApi();
    }

}
