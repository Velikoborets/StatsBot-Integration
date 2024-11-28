<?php

return [
    '/' => 'site/index',

    // Роуты для модуля пользователей
    '/users' => '/user/user/index',
    '/users/create' => '/user/user/create',
    '/users/<id:\d+>' => '/user/user/view',
    '/users/update/<id:\d+>' => '/user/user/update',
    '/users/delete/<id:\d+>' => '/user/user/delete',

    // Роуты для модуля ролей
    '/roles' => '/roles/role/index',
    '/roles/create' => '/roles/role/create',
    '/roles/<id:\d+>' => '/roles/role/view',
    '/roles/update/<id:\d+>' => '/roles/role/update',
    '/roles/delete/<id:\d+>' => '/roles/role/delete',

    // Общие роуты для всех контроллеров
    // '<controllers:\w+>/<id:\d+>' => '<controllers>/view?id=',
    // '<controllers:\w+>/<action:\w+>/<id:\d+>' => '<controllers>/<action>',
    // '<controllers:\w+>/<action:\w+>' => '<controllers>/<action>',

    // Общие роуты для модулей
    '<module:\w+>/<controllers:\w+>/<id:\d+>' => '<module>/<controllers>/view?id=',
    '<module:\w+>/<controllers:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controllers>/<action>',
    '<module:\w+>/<controllers:\w+>/<action:\w+>' => '<module>/<controllers>/<action>',
];