<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php'),
    $routes = require(__DIR__ . '/routes.php'),
    $db = require(__DIR__ . '/db.php')
);


return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',


    'components' => [

        'request' => [
            'baseUrl' => '',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
      //       //'viewPath' => '@basic/mail',
      //       'transport' => [
      //   'class' => 'Swift_SmtpTransport',
      //   'host' => 'smtp.gmail.com',
      //   'username' => 'chuhovff',
      //   'password' => 'zxcvbn1212',
      //   'port' => '587',
      //   'encryption' => 'tls',
      // ],
            'useFileTransport' => false,
        ],

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

        'urlManager' => $routes,
        'db' => $db,
        'sourceLanguage'=>'ru_ru',
        'language'=>'ru',
        'charset'=>'utf-8',
    ],
    'params' => $params,
];