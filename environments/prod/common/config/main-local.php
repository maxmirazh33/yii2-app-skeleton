<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => '%%dsn%%',
            'username' => '%%username%%',
            'password' => '%%password%%',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 0,
        ],
    ],
];
