<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store', //path to origin images
            'imagesCachePath' => 'upload/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/placeholder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 70, // Optional. Default value is 85.
        ],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' =>
            [
                'formatters' => [
                    'json' => [
                        'class' => 'yii\web\JsonResponseFormatter',
                        'prettyPrint' => YII_DEBUG,
                        'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                    ]
                ]
            ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            // 'enableAutoLogin' => false,
            //  'enableSession'=>false,

            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
/*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'site/index',
                'main' => 'site/main',
                'city' => 'site/city',
                'events' => 'event/all',
                'events/novelty' => 'event/carousel',
                'event' => 'event/view',
                'point' => 'point/view',
                'points' => 'point/all',
                'cafe' => 'cafe/view',
                'cafes' => 'cafe/all',
                'hotels' => 'hotel/all',
                'hotel' => 'hotel/view',
                'cafetypes' => 'type/cafe',
                'hoteltypes' => 'type/hotel',
                'pointtypes' => 'type/point',
                'eventtypes' => 'type/event',
                'tourtypes' => 'type/tourtype',
                'tourcategories' => 'type/tourcategory',
                '<controller:\w+>/<action:/w+>/' => '<controller>/<action>',

            ],
        ],*/
    ],
    'params' => $params,
];
