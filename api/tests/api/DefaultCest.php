<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\ApiTester;

class DefaultCest
{
    public function defaultIndex(ApiTester $I)
    {
        $I->sendGet('/');
        $I->seeResponseCodeIs(200);
    }
}
