<?php

return [
    // Роуты для модуля пользователей
    '/users' => '/user/user/index',
    '/users/create' => '/user/user/create',
    '/users/<id:\d+>' => '/user/user/view',
    '/users/update/<id:\d+>' => '/user/user/update',
    '/users/delete/<id:\d+>' => '/user/user/delete',

    // Роуты для модуля ролей
    '/roles' => '/roles/role/index',
    // '/roles/create' => '/roles/role/create',
    // '/roles/<id:\d+>' => '/roles/role/view',
    // '/roles/update/<id:\d+>' => '/roles/role/update',
    // '/roles/delete/<id:\d+>' => '/roles/role/delete',

    // Общие роуты для всех контроллеров
    '<controller:\w+>/<id:\d+>' => '<controller>/view?id=',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

    '<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view?id=',
    '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
    '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
];