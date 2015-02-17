<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'maxmirazh33\gii\Module',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2-app-skeleton',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
