<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;

use backend\DAL\Repositories\AREventRepository;
use backend\models\Event;
use backend\tests\_fixtures\EventFixture;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

class EventRepositoryTest extends Unit
{


    public function _fixtures()
    {
        return [
            'event' => [
                'class' => EventFixture::className(),
                'dataFile' => codecept_data_dir() . 'event.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new AREventRepository();
    }

    public function testGet()
    {
        $event=new Event();
        $event->setName($name="super category");
        $event->setCity($city=2);
        $event->setDescriptionEvent($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $event->setImageName($url="http://youtube.com");
        $event->setCategory($category=2);
        $event->setLatitude($lat=23.564544);
        $event->setLongtitude($long=35.444447);
        $event->setDate($date="2017-08-02 00:00:00");
        $event->setBegin($begin="12:00:00");
        $event->setEnd($end="13:00:00");

        $this->repository->create($event);

        $found=$this->repository->get($event->getId());

        $this->assertEquals($found->getName(),$event->getName());
        $this->assertEquals($found->getCity(),$event->getCity());
        $this->assertEquals($found->getDescriptionEvent(),$event->getDescriptionEvent());
        $this->assertEquals($found->getImageName(),$event->getImageName());
        $this->assertEquals($found->getCategory(),$event->getCategory());
        $this->assertEquals($found->getLatitude(),$event->getLatitude());
        $this->assertEquals($found->getLongtitude(),$event->getLongtitude());
        $this->assertEquals($found->getDate(),$event->getDate());
        $this->assertEquals($found->getBegin(),$event->getBegin());
        $this->assertEquals($found->getEnd(),$event->getEnd());

    }

    public function testGetNotFound()
    {

        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }


    public function testUpdate()
    {
        $event=new Event();
        $event->setName($name="super category");
        $event->setCity($city=2);
        $event->setDescriptionEvent($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?");
        $event->setImageName($url="http://youtube.com");
        $event->setCategory($category=2);
        $event->setLatitude($lat=23.564544);
        $event->setLongtitude($long=35.444447);
        $event->setDate($date="2017-08-02 00:00:00");
        $event->setBegin($begin="12:00:00");
        $event->setEnd($end="13:00:00");

        $this->repository->create($event);

        $edit=$this->repository->get($event->getId());
        $edit->setName($new_name="puper");
        $this->repository->update($edit);

        $found=$this->repository->get($event->getId());

        $this->assertEquals($new_name,$found->getName());
    }

    public function testDelete()
    {
        $this->expectException(NotFoundException::class);
        $event=new Event();
        $event->setName($name="super category");
        $event->setCity($city=2);
        $event->setDescriptionEvent($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $event->setImageName($url="http://youtube.com");
        $event->setCategory($category=2);
        $event->setLatitude($lat=23.564544);
        $event->setLongtitude($long=35.444447);
        $event->setDate($date="2017-08-02 00:00:00");
        $event->setBegin($begin="12:00:00");
        $event->setEnd($end="13:00:00");

        $this->repository->create($event);

        $this->repository->delete($event);

        $this->repository->get($event->getId());
    }


}
