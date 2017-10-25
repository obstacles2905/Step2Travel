<?php

/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 16:12
 */

namespace tests\unit\repositories;

use backend\DAL\Repositories\ARMainDescriptionRepository;
use backend\models\MainDescription;
use backend\tests\_fixtures\MainDescriptionFixture;
use Codeception\Test\Unit;
use backend\DAL\Interfaces\NotFoundException;

use SebastianBergmann\GlobalState\RuntimeException;


class MainDescriptionRepositoryTest extends Unit
{


    public function _fixtures()
    {
        return [
            'maindescription' => [
                'class' => MainDescriptionFixture::className(),
                'dataFile' => codecept_data_dir() . 'maindescription.php'
            ]
        ];
    }

    protected $repository;

    public function _before()
    {

        $this->repository = new ARMainDescriptionRepository();
    }

    public function testGet()
    {
        $main = new MainDescription();
        $main->setIntroText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setShow(true);
        $this->repository->create($main);
        $found = $this->repository->get($main->getId());

        $this->assertNotNull($found);
        $this->assertEquals($main->getId(), $found->getId());
    }

    public function testGetNotFound()
    {

        $this->expectException(NotFoundException::class);
        $this->repository->get(999);
    }

    public function testCreate()
    {


        $main = new MainDescription();
        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setShow(true);
        $this->repository->create($main);
        $found = $this->repository->get($main->getId());

        $this->assertEquals($main->getId(), $found->getId());
        $this->assertEquals($main->getIntroText(), $found->getIntroText());
        $this->assertEquals($main->getVideoURL(), $found->getVideoURL());
        $this->assertEquals($main->getVideoText(), $found->getVideoText());
        $this->assertEquals($main->getShow(), $found->getShow());

    }

    public function testUpdate()
    {
        $main = new MainDescription();
        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setShow(true);
        $this->repository->create($main);
        $edit = $this->repository->get($main->getId());

        $edit->setIntroText($text = "qwerty asdfg zxcvb puper");
        $this->repository->update($edit);
        $found = $this->repository->get($main->getId());

        $this->assertEquals($text, $found->getIntroText());


    }

    public function testDelete()
    {
        $main1 = new MainDescription();
        $main1->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
        $main1->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main1->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main1->setShow(true);
        $this->repository->create($main1);

        $main = new MainDescription();
        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setShow(true);
        $this->repository->create($main);
        $this->repository->delete($main);

        $this->expectException(NotFoundException::class);
        $this->repository->get($main->getId());

    }

//    public function testGetSeen()
//    {
//        $main1 = new MainDescription();
//        $main1->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
//        $main1->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main1->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main1->setShow(true);
//        $this->repository->create($main1);
//
//        $found= $this->repository->getSeen();
//
//        $this->assertEquals($found->getId(),$main1->getId());
//
//    }

//    public function testGetSeenFromFalse()
//    {
//        $main1 = new MainDescription();
//        $main1->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
//        $main1->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main1->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main1->setShow(false);
//        $this->repository->create($main1);
//
//        $found= $this->repository->getSeen();
//
//        $this->assertEquals($found->getId(),$main1->getId());
//    }

//    public function testGetSeenFromAllTrue()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main1 = new MainDescription();
//        $main1->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu    efhuehfuewhf");
//        $main1->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main1->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main1->setShow(true);
//        $this->repository->create($main1);
//
//        $found= $this->repository->getSeen();
//
//        $this->assertEquals($found->getId(),$main->getId());
//    }
//    public function testCreateNextWithShowTrue()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siup rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(true);
//        $this->repository->create($main2);
//
//        $found_main = $this->repository->get($main->getId());
//        $found_main2 = $this->repository->get($main2->getId());
//        $this->assertNotEquals($found_main->getShow(), $found_main2->getShow());
//    }
//
//    public function testCreateNextWithShowFalse()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siup rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(false);
//        $this->repository->create($main2);
//
//        $found_main = $this->repository->get($main->getId());
//
//        $this->assertEquals($found_main->getShow(), true);
//    }
//
//    public function testUpdateNextWithShowTrue()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(false);
//        $this->repository->create($main2);
//
//        $edit = $this->repository->get($main2->getId());
//        $edit->setShow(true);
//        $this->repository->update($edit);
//
//        $found_main = $this->repository->get($main->getId());
//        $found_main2 = $this->repository->get($main2->getId());
//        $this->assertNotEquals($found_main->getShow(), $found_main2->getShow());
//    }
//
//    public function testUpdateNextWithShowFalse()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(false);
//        $this->repository->create($main2);
//
//        $edit = $this->repository->get($main2->getId());
//        $edit->setVideoURL("https://www.youtults?search_query=webdriver+torso");
//        $this->repository->update($edit);
//
//        $found_main = $this->repository->get($main->getId());
//
//        $this->assertEquals($found_main->getShow(), true);
//    }

//    public function testDeleteNextWithShowTrue()
//    {
//        $main0 = new MainDescription();
//        $main0->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main0->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main0->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main0->setShow(true);
//        $this->repository->create($main0);
//
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(false);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(true);
//        $this->repository->create($main2);
//        $this->repository->delete($main2);
//
//        $found_main = $this->repository->get($main->getId());
//
//        $this->assertEquals($found_main->getShow(), true);
//    }

    public function testDeleteLast()
    {
        $this->expectException(RuntimeException::class);

        $main = new MainDescription();
        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
        $main->setShow(true);
        $this->repository->create($main);

        $this->repository->delete($main);


    }

//    public function testDeleteNextWithShowFalse()
//    {
//        $main = new MainDescription();
//        $main->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main->setShow(true);
//        $this->repository->create($main);
//
//        $main2 = new MainDescription();
//        $main2->setIntroText("super siuper feef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setVideoURL("https://www.youtube.com/results?search_query=webdriver+torso");
//        $main2->setVideoText("super siuper lsfoefe efefeef. ef e!efef e  rhyrfhyrhfyrh eeeeheuefhsu efhuehfuewhf");
//        $main2->setShow(false);
//        $this->repository->create($main2);
//
//        $this->repository->delete($main2);
//
//
//        $found_main = $this->repository->get($main->getId());
//
//        $this->assertEquals($found_main->getShow(), true);
//    }
}
