<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\_fixtures\HotelFixture;

use api\tests\ApiTester;
use api\tests\_fixtures\HotelTypeFixture;
use api\tests\_fixtures\HotelTypesFixture;
class HotelCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'hotel' => [
                'class' => HotelFixture::className(),
                'dataFile' => codecept_data_dir() . 'hotel.php'
            ],
            'hoteltype' => [
                'class' => HotelTypeFixture::className(),
                'dataFile' => codecept_data_dir() . 'hoteltype.php'
            ],
            'hoteltypes' => [
                'class' => HotelTypesFixture::className(),
                'dataFile' => codecept_data_dir() . 'hoteltypes.php'
            ]
        ]);
    }



    public function testOne(ApiTester $I)
    {
        $I->sendGet('/hotel?id=1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);
    }

    public function testAll(ApiTester $I)
    {
        $I->sendGet('/hotels');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1,'id' => 2]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);

    }




}