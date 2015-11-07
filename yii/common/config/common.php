<?php

require(__DIR__.'/constants.php');
$bootstrap = require(__DIR__.'/bootstrap.php');

$config = [
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => COOKIEKEY,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'site/index'
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '//static.'.$_SERVER['MACHINE'],
                    'css'=>['css/'.filemtime('/var/www/grickit.us/static/css/bootstrap.min.css').'_bootstrap.min.css']
                ],
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '//static.'.$_SERVER['MACHINE'],
                    'js'=>['javascript/'.filemtime('/var/www/grickit.us/static/javascript/jquery.min.js').'_jquery.min.js']
                ],
                'yii\widgets\ActiveFormAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '//static.'.$_SERVER['MACHINE'],
                    'js'=>['javascript/'.filemtime('/var/www/grickit.us/static/javascript/yii_activeform.js').'_yii_activeform.js']
                ],
                'yii\validators\ValidationAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '//static.'.$_SERVER['MACHINE'],
                    'js'=>['javascript/'.filemtime('/var/www/grickit.us/static/javascript/yii_validation.js').'_yii_validation.js']
                ],
                'yii\web\YiiAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '//static.'.$_SERVER['MACHINE'],
                    'js'=>['javascript/'.filemtime('/var/www/grickit.us/static/javascript/yii.js').'_yii.js']
                ],
            ]
        ],
        'StaticURL' => [
            'class' => 'common\components\StaticURL'
        ],
        'SafeName' => [
            'class' => 'common\components\SafeName'
        ]
    ],
    'params' => [
        'adminEmail' => 'webmaster@grickit.us',
        //'user.passwordResetTokenExpire' => 3600,
    ],
    'runtimePath' => dirname(__DIR__).'/runtime'
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
