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

use api\tests\ApiTester;

use api\tests\_fixtures\CafeFixture;
class CafeCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'cafe' => [
                'class' => CafeFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafe.php'
            ],
            'cafetype' => [
                'class' => CafeTypeFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafetype.php'
            ],
            'cafetypes' => [
                'class' => CafeTypesFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafetypes.php'
            ]
        ]);
    }



    public function testOne(ApiTester $I)
    {
        $I->sendGet('/cafe?id=1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);
    }

    public function testAll(ApiTester $I)
    {
        $I->sendGet('/cafes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1,'id' => 2]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);
    }





}