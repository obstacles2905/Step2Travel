<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 19.07.2017
 * Time: 11:51
 */

namespace tests\unit\entities\MainDescription;

use backend\models\MainDescription;
use Codeception\Test\Unit;

class MainDescriptionCreateTest extends Unit
{


    public function testSuccess()
    {
        $main = new MainDescription();
        $main->setIntroText($introText = 'Best site ever. StepToTravel.Best site ever. StepToTravel. Best site ever. StepToTravel');
        $main->setVideoURL($url = "http://youtube.com/test_video");
        $main->setVideoText($videoText = "Best video ever. StepToTravel.Best site ever. StepToTravel");
        $main->setShow($isShow = true);

        $this->assertEquals($introText, $main->getIntroText());
        $this->assertEquals($url, $main->getVideoURL());
        $this->assertEquals($videoText, $main->getVideoText());
        $this->assertEquals($isShow, $main->getShow());
    }

    public function testWithoutURL()
    {
        $this->expectException(\DomainException::class);
        $main = new MainDescription();
        $main->setShow($isShow = true);
        $main->setIntroText($introText = 'Best site ever. StepToTravel.Best site ever. StepToTravel. Best site ever. StepToTravel');
        $main->setVideoURL("");
        $main->setVideoText($videoText = "Best video ever. StepToTravel.Best site ever. StepToTravel");

    }

    public function testWithoutVideoText()
    {
        $this->expectException(\DomainException::class);
        $main = new MainDescription();
        $main->setShow($isShow = true);
        $main->setIntroText($introText = 'Best site ever. StepToTravel.Best site ever. StepToTravel. Best site ever. StepToTravel');
        $main->setVideoURL($url = "http://youtube.com/test_video");
        $main->setVideoText($videoText = "");

    }
}