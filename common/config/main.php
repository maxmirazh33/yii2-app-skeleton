<?php
return [
    'name' => 'Приложение',
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@common' => dirname(__DIR__),
        '@frontend' => dirname(dirname(__DIR__)) . '/frontend',
        '@backend' => dirname(dirname(__DIR__)) . '/backend',
        '@frontendUrl' => '/',
        '@backendUrl' => '/backend',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
