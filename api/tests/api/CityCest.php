<?php

namespace api\tests\api;

use api\tests\ApiTester;

class CityCest
{
    public function cityIndex(ApiTester $I)
    {
        $I->sendGet('/city');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}