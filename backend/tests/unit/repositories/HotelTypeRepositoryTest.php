<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;

use backend\models\HotelType;
use backend\DAL\Repositories\ARHotelTypeRepository;
use backend\tests\_fixtures\HotelTypeFixture;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

class HotelTypeRepositoryTest extends Unit
{


    public function _fixtures()
    {
        return [
            'hoteltype' => [
                'class' => HotelTypeFixture::className(),
                'dataFile' => codecept_data_dir() . 'hoteltype.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new ARHotelTypeRepository();
    }

    public function testGet()
    {
        $category = new HotelType();
        $category->setName($name = "super category");
        $this->repository->create($category);

        $found = $this->repository->get($category->getId());

        $this->assertEquals($found->getName(), $category->getName());

    }

    public function testGetNotFound()
    {

        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }


    public function testUpdate()
    {
        $category = new HotelType();
        $category->setName($name = "super category");
        $this->repository->create($category);

        $edit = $this->repository->get($category->getId());
        $edit->setName($new_name = "puper");
        $this->repository->update($edit);

        $found = $this->repository->get($category->getId());
        $this->assertEquals($new_name, $found->getName());
    }

    public function testDelete()
    {
        $this->expectException(NotFoundException::class);
        $category = new HotelType();
        $category->setName($name = "super category");
        $this->repository->create($category);

        $this->repository->delete($category);

        $this->repository->get($category->getId());
    }


}
