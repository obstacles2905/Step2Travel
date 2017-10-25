<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;

use backend\DAL\Repositories\ARCafeRepository;
use backend\models\Cafe;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;
use backend\tests\_fixtures\CafeFixture;

class CafeRepositoryTest extends Unit
{
    public function _fixtures()
    {
        return [
            'event' => [
                'class' => CafeFixture::className(),
                'dataFile' => codecept_data_dir() . 'cafe.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new ARCafeRepository();
    }

    public function testGet()
    {
        $point = new Cafe();
        $point->setName($name = "super point");
        $point->setRate($rate = 4);
        $point->setDescription($desc = "Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url = "http://youtube.com");
        $point->setLatitude($lat = 23.564544);
        $point->setLongtitude($long = 35.444447);
        $point->setTour3d($tour3d = 'tour');

        $this->repository->create($point);

        $found = $this->repository->get($point->getId());

        $this->assertEquals($found->getName(), $point->getName());
        $this->assertEquals($found->getRate(), $point->getRate());
        $this->assertEquals($found->getDescription(), $point->getDescription());
        $this->assertEquals($found->getImageName(), $point->getImageName());
        $this->assertEquals($found->getLatitude(), $point->getLatitude());
        $this->assertEquals($found->getLongtitude(), $point->getLongtitude());
        $this->assertEquals($found->getTour3d(), $point->getTour3d());
    }

    public function testGetNotFound()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }


    public function testUpdate()
    {

        $point = new Cafe();
        $point->setName($name = "super point");
        $point->setRate($rate = 4);
        $point->setDescription($desc = "Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url = "http://youtube.com");
        $point->setLatitude($lat = 23.564544);
        $point->setLongtitude($long = 35.444447);
        $point->setTour3d($tour3d = 'tour');

        $this->repository->create($point);

        $edit = $this->repository->get($point->getId());
        $edit->setName($new_name = "puper");
        $this->repository->update($edit);

        $found = $this->repository->get($point->getId());

        $this->assertEquals($new_name, $found->getName());


    }

    public function testDelete()
    {
        $this->expectException(NotFoundException::class);
        $point = new Cafe();
        $point->setName($name = "super point");
        $point->setRate($rate = 4);
        $point->setDescription($desc = "Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url = "http://youtube.com");
        $point->setLatitude($lat = 23.564544);
        $point->setLongtitude($long = 35.444447);
        $point->setTour3d($tour3d = 'tour');

        $this->repository->create($point);

        $this->repository->delete($point);

        $this->repository->get($point->getId());
    }
}
