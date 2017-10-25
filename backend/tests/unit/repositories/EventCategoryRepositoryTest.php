<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;

use backend\DAL\Repositories\AREventCategoryRepository;
use backend\models\EventCategory;
use backend\tests\_fixtures\EventCategoryFixture;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

class EventCategoryRepositoryTest extends Unit
{


    public function _fixtures()
    {
        return [
            'eventcategory' => [
                'class' => EventCategoryFixture::className(),
                'dataFile' => codecept_data_dir() . 'eventcategory.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new AREventCategoryRepository();
    }

    public function testGet()
    {
        $category=new EventCategory();
        $category->setName($name="super category");
        $this->repository->create($category);

        $found=$this->repository->get($category->getId());

        $this->assertEquals($found->getName(),$category->getName());

            }

    public function testGetNotFound()
    {

        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }


    public function testUpdate()
    {
        $category=new EventCategory();
        $category->setName($name="super category");
        $this->repository->create($category);

        $edit=$this->repository->get($category->getId());
        $edit->setName($new_name="puper");
        $this->repository->update($edit);

        $found=$this->repository->get($category->getId());
        $this->assertEquals($new_name,$found->getName());
           }

    public function testDelete()
    {
        $this->expectException(NotFoundException::class);
        $category=new EventCategory();
        $category->setName($name="super category");
        $this->repository->create($category);

        $this->repository->delete($category);

        $this->repository->get($category->getId());
    }


}
