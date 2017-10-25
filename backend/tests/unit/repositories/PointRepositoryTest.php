<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;


use backend\DAL\Repositories\ARPointRepository;
use backend\models\Point;
use backend\tests\_fixtures\PointFixture;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

class PointRepositoryTest extends Unit
{


    public function _fixtures()
    {
        return [
            'event' => [
                'class' => PointFixture::className(),
                'dataFile' => codecept_data_dir() . 'point.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new ARPointRepository();
    }

    public function testGet()
    {
        $point=new Point();
        $point->setName($name="super point");
        $point->setRate($rate=4);
        $point->setDescriptionPoint($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setShortDescriptionPoint($desc_short="БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url="http://youtube.com");
        $point->setPanoramaName($url_panorama="http://youtube.com");
        $point->setLatitude($lat=23.564544);
        $point->setLongtitude($long=35.444447);


        $this->repository->create($point);

        $found=$this->repository->get($point->getId());

        $this->assertEquals($found->getName(),$point->getName());
        $this->assertEquals($found->getRate(),$point->getRate());
        $this->assertEquals($found->getDescriptionPoint(),$point->getDescriptionPoint());
        $this->assertEquals($found->getShortDescriptionPoint(),$point->getShortDescriptionPoint());
        $this->assertEquals($found->getImageName(),$point->getImageName());
        $this->assertEquals($found->getPanoramaName(),$point->getPanoramaName());
       // $this->assertEquals($found->getCategory(),$point->getCategory());
        $this->assertEquals($found->getLatitude(),$point->getLatitude());
        $this->assertEquals($found->getLongtitude(),$point->getLongtitude());

    }

    public function testGetNotFound()
    {

        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }


    public function testUpdate()
    {

        $point=new Point();
        $point->setName($name="super point");
        $point->setRate($rate=4);
        $point->setDescriptionPoint($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setShortDescriptionPoint($desc_short="БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url="http://youtube.com");
        $point->setPanoramaName($url_panorama="http://youtube.com");
        $point->setLatitude($lat=23.564544);
        $point->setLongtitude($long=35.444447);

        $this->repository->create($point);

        $edit=$this->repository->get($point->getId());
        $edit->setName($new_name="puper");
        $this->repository->update($edit);

        $found=$this->repository->get($point->getId());

        $this->assertEquals($new_name,$found->getName());


    }

    public function testDelete()
    {
        $this->expectException(NotFoundException::class);
        $point=new Point();
        $point->setName($name="super point");
        $point->setRate($rate=4);
        $point->setDescriptionPoint($desc="Если бы мы напрямую использовали ActiveRecord, то не могли бы себе позволить не думать о полях в БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setShortDescriptionPoint($desc_short="БД и вместо программирования целыми днями метались бы по StackOverflow с вопросом «Как сохранить поле в JSON в ActiveRecord?»");
        $point->setImageName($url="http://youtube.com");
        $point->setPanoramaName($url_panorama="http://youtube.com");
        $point->setLatitude($lat=23.564544);
        $point->setLongtitude($long=35.444447);

        $this->repository->create($point);

        $this->repository->delete($point);

        $this->repository->get($point->getId());
    }


}
