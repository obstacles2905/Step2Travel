<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\_fixtures\PointCategoryFixture;
use api\tests\_fixtures\PointCategoriesFixture;
use api\tests\_fixtures\PointFixture;
use api\tests\ApiTester;

class PointCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'point' => [
                'class' => PointFixture::className(),
                'dataFile' => codecept_data_dir() . 'point.php'
            ],
            'pointcategory' => [
                'class' => PointCategoryFixture::className(),
                'dataFile' => codecept_data_dir() . 'pointcategory.php'
            ],
            'pointcategories' => [
                'class' => PointCategoriesFixture::className(),
                'dataFile' => codecept_data_dir() . 'pointcategories.php'
            ]
        ]);
    }



    public function testOne(ApiTester $I)
    {
        $I->sendGet('/point?id=1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);
    }

    public function testAll(ApiTester $I)
    {
        $I->sendGet('/points');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 1,'id' => 2]);
        $I->seeResponseContainsJson(['category'=>['id'=>1,'name'=>'історичні']]);
    }



}