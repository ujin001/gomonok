<?php
return [
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'XExeBGStwkeiqFWefSQWUxTA-cPasEC9',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
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
    'authManager' => [
        'class' => '\yii\rbac\DbManager',
        'ruleTable' => 'AuthRule', // Optional
        'itemTable' => 'AuthItem',  // Optional
        'itemChildTable' => 'AuthItemChild',  // Optional
        'assignmentTable' => 'AuthAssignment',  // Optional
    ],
    'user' => [
        'class' => 'auth\components\User',
        'identityClass' => 'auth\models\User', // or replace to your custom identityClass
        'enableAutoLogin' => true,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ],
    ],
    'db' => require(__DIR__ . '/db.php'),
];