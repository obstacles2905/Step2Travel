<?php

namespace api\controllers;


use backend\BLL\Services\CafeTypeService;
use backend\BLL\Services\EventCategoryService;
use backend\BLL\Services\HotelTypeService;
use backend\BLL\Services\PointCategoryService;
use backend\BLL\Services\TourCategoryService;
use backend\BLL\Services\TourTypeService;
use yii\rest\Controller;

/**
 * Site controller
 */
class TypeController extends Controller
{

    private $cafetype;
    private $hoteltype;
    private $pointcategory;
    private $eventcategory;
    private $tourcategory;
    private $tourtype;

    public function __construct($id, $module, CafeTypeService $cafetype, HotelTypeService $hoteltype, PointCategoryService $pointcategory, EventCategoryService $eventcategory, TourCategoryService $tourcategory, TourTypeService $tourtype, array $config = [])
    {
        $this->cafetype = $cafetype;
        $this->hoteltype = $hoteltype;
        $this->pointcategory = $pointcategory;
        $this->eventcategory = $eventcategory;
        $this->tourcategory = $tourcategory;
        $this->tourtype = $tourtype;
        $this->tourcategory = $tourcategory;
        parent::__construct($id, $module, $config);
    }


    protected function verbs()
    {
        return [
            'cafe', 'hotel', 'point', 'event', 'tourtype', 'tourcategory' => [
                'get'
            ]
        ];
    }


    public function actionCafe()
    {
        return $this->cafetype->getAllApi();
    }

    public function actionHotel()
    {
        return $this->hoteltype->getAllApi();
    }

    public function actionPoint()
    {
        return $this->pointcategory->getAllApi();
    }

    public function actionEvent()
    {
        return $this->eventcategory->getAllApi();
    }

    public function actionTourtype()
    {
        return $this->tourtype->getAllApi();
    }

    public function actionTourcategory()
    {
        return $this->tourcategory->getAllApi();
    }


}
