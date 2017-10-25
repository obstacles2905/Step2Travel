<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\ApiTester;
use api\tests\_fixtures\MainFixture;
class MainCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'event' => [
                'class' => MainFixture::className(),
                'dataFile' => codecept_data_dir() . 'main.php'
            ],

        ]);
    }

    public function mainIndex(ApiTester $I)
    {
        $I->sendGet('/main');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->canSeeResponseContainsJson(['show'=>1]);
    }
}