<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        //delete old data from db
        $auth->removeAll();

        //create and roles to db
        $admin = $auth->createRole('admin');
        //$user=$auth->createRole('user');

        $auth->add($admin);
        //$auth->add($user);

        //create and add permissions to db
        $viewAdmin = $auth->createPermission('viewAdmin');
        $viewAdmin->description = 'Look up admin panel';

        //  $viewAcc=$auth->createPermission('viewAcc');
        // $viewAcc->description='Look personal account';

        $auth->add($viewAdmin);
        // $auth->add($viewAcc);

        //map permissions and roles

        //  $auth->addChild($user, $viewAcc);
       // $auth->addChild($admin);

        $auth->addChild($admin, $viewAdmin);
        $auth->assign($admin, 1);
        //   $auth->assign($user, 2);


    }
}

