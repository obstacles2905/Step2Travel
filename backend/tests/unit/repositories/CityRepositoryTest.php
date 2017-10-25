<?php

namespace tests\unit\repositories;

use backend\DAL\Repositories\ARCityRepository;
use backend\models\City;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

class CityRepositoryTest extends Unit
{
    protected $repository;

    public function _before()
    {
        $this->repository = new ARCityRepository();
    }

    public function testGet()
    {
        $city = new City();
        $city->setIp("192.168.0.0");
        $city->setName("Dnepr");
        $city->setDescriptionCity("Dnepr is the best city. ");
        $this->repository->create($city);
        $found = $this->repository->get($city->getId());

        $this->assertNotNull($found);
        $this->assertEquals($city->getId(), $found->getId());
    }

    public function testGetNotFound()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }

    public function testCreate()
    {
        $city = new City();
        $city->setIp("192.168.0.0");
        $city->setName("Dnepr");
        $city->setDescriptionCity("Dnepr is the best city. ");
        $this->repository->create($city);
        $found = $this->repository->get($city->getId());

        $this->assertEquals($city->getId(), $found->getId());
        $this->assertEquals($city->getIp(), $found->getIp());
        $this->assertEquals($city->getName(), $found->getName());
        $this->assertEquals($city->getDescriptionCity(), $found->getDescriptionCity());
    }

    public function testUpdate()
    {
        $city = new City();
        $city->setIp("192.168.0.0");
        $city->setName("Dnepr");
        $city->setDescriptionCity("Dnepr is the best city. ");
        $this->repository->create($city);
        $edit = $this->repository->get($city->getId());

        $edit->setName($name = "Kiev");
        $this->repository->update($edit);
        $found = $this->repository->get($city->getId());

        $this->assertEquals($name, $found->getName());
    }

    public function testDelete()
    {
        $city = new City();
        $city->setIp("192.168.0.0");
        $city->setName("Dnepr");
        $city->setDescriptionCity("Dnepr is the best city. ");
        $this->repository->create($city);
        $this->repository->delete($city);

        $this->expectException(NotFoundException::class);
        $this->repository->get($city->getId());
    }
}