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
                '' => 'site/index',
                'menu' => 'menu/index',
                '<action:\w+>' => 'site/<action>'
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
