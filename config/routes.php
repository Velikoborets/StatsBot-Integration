<?php

return [
    // Роут для гл.стр
    '/' => 'site/index',

    // Роут для модуля pelmen
    '/pelmen' => '/pelmen/rule/index',
    '/pelmen/create' => '/pelmen/rule/create',
    '/pelmen/result/<id:\d+>' => '/pelmen/rule/result',
    '/pelmen/update/<id:\d+>' => '/pelmen/rule/update',
    '/pelmen/delete/<id:\d+>' => '/pelmen/rule/delete',

    // Роут для модуля Статистики
    '/statistic' => '/statistic/statistic/index',

    // Роуты для модуля пользователей
    '/users' => '/user/user/index',
    '/users/create' => '/user/user/create',
    '/users/<id:\d+>' => '/user/user/views',
    '/users/update/<id:\d+>' => '/user/user/update',
    '/users/delete/<id:\d+>' => '/user/user/delete',
    '/login' => 'user/user/login',
    '/logout' => 'user/user/logout',

    // Роуты для модуля ролей
    '/roles' => '/roles/role/index',
    '/roles/create' => '/roles/role/create',
    '/roles/<id:\d+>' => '/roles/role/views',
    '/roles/update/<id:\d+>' => '/roles/role/update',
    '/roles/delete/<id:\d+>' => '/roles/role/delete',

    // Общие роуты для модулей
    '<module:\w+>/<controllers:\w+>/<id:\d+>' => '<module>/<controllers>/views?id=',
    '<module:\w+>/<controllers:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controllers>/<action>',
    '<module:\w+>/<controllers:\w+>/<action:\w+>' => '<module>/<controllers>/<action>',
];
