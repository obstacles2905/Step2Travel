<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 19:11
 */

namespace backend\Infrastructure;


use backend\DAL\Interfaces\ICafeTypeRepository;
use backend\DAL\Repositories\ARCafeTypeRepository;
use yii\base\Application;
use yii\base\BootstrapInterface;

class ContainerBootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $container=\Yii::$container;
        $container->setSingleton(ICafeTypeRepository::class,ARCafeTypeRepository::class);
    }
}