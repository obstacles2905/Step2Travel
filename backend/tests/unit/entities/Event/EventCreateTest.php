<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 11:51
 */

namespace tests\unit\entities\MainDescription;

use backend\DAL\Interfaces\NotFoundException;
use backend\models\Event;

use Codeception\Test\Unit;

class EventCreateTest extends Unit
{


    public function testSuccess()
    {
        $main = new Event();
        $main->setName($name = "event test");
        $main->setCity($city = 3);
        $main->setImageName($url = "https://newphoto.otg.co");
        $main->setLatitude($lat = 23.94983894);
        $main->setLongtitude($lon = 45.34535555);
        $main->setDate($date = "12.05.2017");
        $main->setBegin($begin = "20:00");
        $main->setEnd($end = "03:00");
        $main->setDescriptionEvent($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");


        $this->assertEquals($name, $main->getName());
        $this->assertEquals($url, $main->getImageName());
        $this->assertEquals($city, 3);
        $this->assertEquals($lat, $main->getLatitude());
        $this->assertEquals($lon, $main->getLongtitude());
        $this->assertEquals($date, $main->getDate());
        $this->assertEquals($begin, $main->getBegin());
        $this->assertEquals($end, $main->getEnd());
        $this->assertEquals($description, $main->getDescriptionEvent());
    }

    public function testNoCity()
    {

        $main = new Event();
        $main->setName($name = "event test");
        $main->setCity($city = 666);
        $main->setImageName($url = "https://newphoto.otg.co");
        $main->setLatitude($lat = 23.94983894);
        $main->setLongtitude($lon = 45.34535555);
        $main->setDate($date = "12.05.2017");
        $main->setBegin($begin = "20:00");
        $main->setEnd($end = "03:00");
        $main->setDescriptionEvent($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");


        $this->expectException(NotFoundException::class);
        $this->assertEquals($name, $main->getName());
        $this->assertEquals($url, $main->getImageName());
        $this->assertEquals($city, $main->getCity());
        $this->assertEquals($lat, $main->getLatitude());
        $this->assertEquals($lon, $main->getLongtitude());
        $this->assertEquals($date, $main->getDate());
        $this->assertEquals($begin, $main->getBegin());
        $this->assertEquals($end, $main->getEnd());
        $this->assertEquals($description, $main->getDescriptionEvent());

    }


}