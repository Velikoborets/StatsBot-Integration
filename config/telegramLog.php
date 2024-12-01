<?php

use app\modules\pelmen\components\TelegramLogTarget;

return [
    'targets' => [
        [
            'class' => TelegramLogTarget::class,
            'levels' => ['info'],
            'categories' => ['telegram'],
            'botToken' => '7865256460:AAH8grCTlYBOTtJfewzj6U0aCSD6G_hnjZo',
            'chatId' => -4577403143,
        ],
    ],
];