<?php

return [
    'id' => 'app-front',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'front\controllers',
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
                '' => 'thing/index',
                '<controller:\w+>s' => '<controller>/index',
                '<controller:\w+>' => '<controller>/index',
                '<controller:\w+>/<action:view>/<name:\w+>' => '<controller>/view',
                '<controller:\w+>/<action:tagged>/<tag:\w+>' => '<controller>/tagged'
            ],
        ],
    ],
    'params' => [
        'adminEmail' => 'thegrickit@gmail.com',
    ],
];
