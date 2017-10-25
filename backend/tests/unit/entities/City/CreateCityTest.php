<?php

namespace tests\unit\entities\City;

use backend\models\City;
use Codeception\Test\Unit;

class CreateCityTest extends Unit
{
    public function testSuccessCreate()
    {
        $city = new City();
        $city->setIp($ip = "192.168.23.32");
        $city->setName($name = "Dnepr");
        $city->setDescriptionCity($descriptionCity = "Dnepr is the best city. Dnepr is the best city. Dnepr is the best city. ");

        $this->assertEquals($ip, $city->getIp());
        $this->assertEquals($name, $city->getName());
        $this->assertEquals($descriptionCity, $city->getDescriptionCity());
    }

    public function testWithoutIp()
    {
        $this->expectException(\DomainException::class);
        $city = new City();
        $city->setIp($ip = "");
        $city->setName($name = "Dnepr");
        $city->setDescriptionCity($descriptionCity = "Dnepr is the best city. Dnepr is the best city. Dnepr is the best city. ");
    }

    public function testWithoutName()
    {
        $this->expectException(\DomainException::class);
        $city = new City();
        $city->setIp($ip = "192.168.23.32");
        $city->setName($name = "");
        $city->setDescriptionCity($descriptionCity = "Dnepr is the best city. Dnepr is the best city. Dnepr is the best city. ");
    }

    public function testWithoutDescriptionCity()
    {
        $this->expectException(\DomainException::class);
        $city = new City();
        $city->setIp($ip = "192.168.23.32");
        $city->setName($name = "Dnepr");
        $city->setDescriptionCity($descriptionCity = "");
    }
}