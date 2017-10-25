<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\_fixtures\CafeTypeFixture;
use api\tests\_fixtures\CafeTypesFixture;
use api\tests\_fixtures\EventFixture;
use api\tests\_fixtures\HotelTypesFixture;
use api\tests\_fixtures\PointCategoryFixture;
use api\tests\ApiTester;
use api\tests\_fixtures\PointCategoriesFixture;
use backend\tests\_fixtures\HotelTypeFixture;
use api\tests\_fixtures\EventCategoryFixture;

class TypesCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'hoteltype' => [
                'class' => HotelTypeFixture::className(),
                'dataFile' => codecept_data_dir() . 'hoteltype.php'
            ],
            'cafetype' => [
                'class' => CafeTypeFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafetype.php'
            ],
            'pointcategory' => [
                'class' => PointCategoryFixture::className(),
                'dataFile' => codecept_data_dir() . 'pointcategory.php'
            ],
            'eventcategory' => [
                'class' => EventCategoryFixture::className(),
                'dataFile' => codecept_data_dir() . 'eventcategory.php'
            ],
            'pointcategories' => [
                'class' => PointCategoriesFixture::className(),
                'dataFile' => codecept_data_dir() . 'pointcategories.php'
            ],
            'hoteltypes' => [
                'class' => HotelTypesFixture::className(),
                'dataFile' => codecept_data_dir() . 'hoteltypes.php'
            ],
            'event' => [
                'class' => EventFixture::className(),
                'dataFile' => codecept_data_dir() . 'event.php'
            ],
            'cafetypes' => [
                'class' => CafeTypesFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafetypes.php'
            ]

        ]);
    }


    public function testCafe(ApiTester $I)
    {
        $I->sendGet('/cafetypes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1, 'id' => 2]);
        $I->dontSeeResponseContainsJson(['id'=>3]);
    }

    public function testHotel(ApiTester $I)
    {
        $I->sendGet('/hoteltypes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1, 'id' => 2]);
        $I->dontSeeResponseContainsJson(['id'=>3]);
    }

    public function testPoint(ApiTester $I)
    {
        $I->sendGet('/pointtypes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1, 'id' => 2]);
        $I->dontSeeResponseContainsJson(['id'=>3]);
    }

    public function testEvent(ApiTester $I)
    {
        $I->sendGet('/eventtypes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1, 'id' => 2]);
        $I->dontSeeResponseContainsJson(['id'=>3]);
    }


}