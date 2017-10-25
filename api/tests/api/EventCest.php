<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 18.07.2017
 * Time: 14:16
 */

namespace api\tests\api;

use api\tests\_fixtures\EventCategoryFixture;
use api\tests\_fixtures\EventFixture;
use api\tests\ApiTester;

class EventCest
{

    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'event' => [
                'class' => EventFixture::className(),
                'dataFile' => codecept_data_dir() . 'event.php'
            ],
            'events' => [
                'class' => EventCategoryFixture::className(),
                'dataFile' => codecept_data_dir() . 'eventcategory.php'
            ]
        ]);
    }

    public function testAll(ApiTester $I)
    {
        $I->sendGet('/events');
        $I->seeResponseCodeIs(200);

        $I->seeResponseContainsJson(['id' => 1,
            'id' => 2,
            'id' => 5,
            'id' => 8,
        ]);
        $I->seeResponseContainsJson(['date' => '06/20/2020']);
        $I->seeResponseContainsJson(['month'=>'Червня']);
    }

    public function testOne(ApiTester $I)
    {
        $I->sendGet('/event?id=8');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 8]);
        $I->seeResponseContainsJson(['date' => '08/05/2017']);
        $I->seeResponseContainsJson(['month'=>'Серпня']);
    }

    public function testCarousel(ApiTester $I)
    {
        $I->sendGet('/events/novelty?id_city=0');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['month'=>'Серпня']);
        $I->dontSeeResponseContainsJson(['city' => 2,
            'descriptionEvent' => 'Понад 600 старовинних і ексклюзивних машин з’їдуться не лише з України, а й  Польщі, Білорусі, Чехії. Перед гостями заходу експонати постануть серед 90 бойових і цивільних літаків музею. Серед авто - радянські, німецькі, французькі, італійські, чеські й американські моделі, вироблені як у 1930-х, так і 1990-х роках. Деякі з них в одному екземплярі, або мають рекордно малий пробіг. Новинка цьогорічного фестивалю - електромобілі та машини із зони АТО. Демонструватимуть вантажівки, ретро автобуси та велику колекцію двоколісного транспорту – скутери, мопеди, мотоцикли. Крім техніки на колесах, виставка старовинних меблів та радіоапаратури, виробленої із 1940-х до 1980-х років, яку розмістять в одному із ретро автобусів.',
            'latitude' => '34.5539841',
            'longtitude' => '45.5539841',
            'begin' => '12:00:00',
            'end' => '13:00:00',
            'category' => 1,

        ]);
        $I->seeResponseContainsJson(['date' => '06/20/2020']);
    }

    public function testCarouselWithCity(ApiTester $I)
    {
        $I->sendGet('/events/novelty?id_city=8');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => 8]);
    }

}