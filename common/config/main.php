<?php
return [
    'name' => 'Приложение',
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@common' => dirname(__DIR__),
        '@frontend' => dirname(dirname(__DIR__)) . '/frontend',
        '@backend' => dirname(dirname(__DIR__)) . '/backend',
        '@console' => dirname(dirname(__DIR__)) . '/console',
    ],
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'frontendUrlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '',
        ],
        'formatter' => [
            'dateFormat' => 'long',
            'datetimeFormat' => 'long',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'settings' => [
            'class' => 'common\components\Settings',
        ],
    ],
];
