<?php

return [
    'id' => 'app-union',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'union\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'rules' => [
                'menu' => 'menu/index',
                'menu/<name:\w+>' => 'category/view',
                '<controller:\w+>/<action:\w+>/<name:\w+>' => '<controller>/<action>',
                '<action:\w+>' => 'site/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=grickit.us',
            'username' => UNIONDBUSER,
            'password' => UNIONDBPASS,
            'charset' => 'utf8',
        ],
    ],
    'params' => [
        'adminEmail' => 'thegrickit@gmail.com',
    ],
];
