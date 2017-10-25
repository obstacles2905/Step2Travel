<?php

namespace tests\unit\entities\Tour;

use backend\DAL\Interfaces\NotFoundException;
use backend\models\Tour;
use Codeception\Test\Unit;

class TourCreateTest extends Unit
{
    public function testSuccess()
    {
        $tour = new Tour();
        $tour->setName($name = "Tour");
        $tour->setCity($city = 1);
        $tour->setType($type = 1);
        $tour->setCategory($category = 1);
        $tour->setDescription($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");
        $tour->setImageName($image = "image");
        $tour->setRate($rate = 3);

        $this->assertEquals($name, $tour->getName());
        $this->assertEquals($city, 1);
        $this->assertEquals($type, 1);
        $this->assertEquals($category, 1);
        $this->assertEquals($description, $tour->getDescription());
        $this->assertEquals($image, $tour->getImageName());
        $this->assertEquals($rate, $tour->getRate());
    }

    public function testNoCity()
    {
        $tour = new Tour();
        $tour->setName($name = "Tour");
        $tour->setCity($city = 999);
        $tour->setType($type = 1);
        $tour->setCategory($category = 1);
        $tour->setDescription($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");
        $tour->setImageName($image = "image");
        $tour->setRate($rate = 3);

        $this->expectException(NotFoundException::class);
        $this->assertEquals($name, $tour->getName());
        $this->assertEquals($city, $tour->getCityFull());
        $this->assertEquals($type, 1);
        $this->assertEquals($category, 1);
        $this->assertEquals($description, $tour->getDescription());
        $this->assertEquals($image, $tour->getImageName());
        $this->assertEquals($rate, $tour->getRate());
    }

    public function testNoType()
    {
        $tour = new Tour();
        $tour->setName($name = "Tour");
        $tour->setCity($city = 1);
        $tour->setType($type = 1);
        $tour->setCategory($category = 1);
        $tour->setDescription($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");
        $tour->setImageName($image = "image");
        $tour->setRate($rate = 3);

        $this->expectException(NotFoundException::class);
        $this->assertEquals($name, $tour->getName());
        $this->assertEquals($city, 1);
        $this->assertEquals($type, $tour->getTypeFull());
        $this->assertEquals($category, 1);
        $this->assertEquals($description, $tour->getDescription());
        $this->assertEquals($image, $tour->getImageName());
        $this->assertEquals($rate, $tour->getRate());
    }

    public function testNoCategory()
    {
        $tour = new Tour();
        $tour->setName($name = "Tour");
        $tour->setCity($city = 1);
        $tour->setType($type = 1);
        $tour->setCategory($category = 1);
        $tour->setDescription($description = "По этому принципу работает ActiveRecord в Yii, Eloquent в Laravel, а также сторонние библиотеки вроде Propel ORM. Они предоставляют лёгкий доступ к данным: все поля из таблицы в БД становятся публичными свойствами объекта. Такая архитектура с внутренней работой удобна тем, что изнутри объект имеет доступ ко всем своим приватным полям. Не нужно создавать отдельные классы репозиториев и использовать рефлексию. Но неудобно тем, что все вспомогательные преобразования данных нужно вписывать туда же внутрь. В итоге при отсутствии дисциплины у разработчика такой класс Employee может оказаться большим и неповоротливым.");
        $tour->setImageName($image = "image");
        $tour->setRate($rate = 3);

        $this->expectException(NotFoundException::class);
        $this->assertEquals($name, $tour->getName());
        $this->assertEquals($city, 1);
        $this->assertEquals($type, 1);
        $this->assertEquals($category, $tour->getCategoryFull());
        $this->assertEquals($description, $tour->getDescription());
        $this->assertEquals($image, $tour->getImageName());
        $this->assertEquals($rate, $tour->getRate());
    }
}