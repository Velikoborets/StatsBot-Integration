<?php

use yii\helpers\ArrayHelper;
use app\modules\pelmen\components\TelegramLogTarget;
use app\modules\pelmen\components\AppLogTarget;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$routes = require __DIR__ . '/routes.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'roles' => [
            'class' => 'app\modules\roles\Module',
        ],
        'statistic' => [
            'class' => 'app\modules\statistic\Module',
        ],
        'pelmen' => [
            'class' => 'app\modules\pelmen\Module',
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'gIVjMY3XpFn8eiCzztZfOO3qtpahgk8B',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG,
            'targets' => [
                [
                    'categories' => ['telegram'],
                    'levels' => ['info'],
                    'class' => TelegramLogTarget::class,
                    'botToken' => '7865256460:AAH8grCTlYBOTtJfewzj6U0aCSD6G_hnjZo',
                    'chatId' => -4577403143,
                ],
                [
                    'categories' => ['local'],
                    'levels' => ['info'],
                    'class' => AppLogTarget::class,
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => $routes,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

if (file_exists(__DIR__ . '/web-local.php')) {
    $localConfig = require __DIR__ . '/web-local.php';
    $config = ArrayHelper::merge($config, $localConfig);
}

return $config;