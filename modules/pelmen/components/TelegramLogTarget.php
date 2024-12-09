<?php

namespace app\modules\pelmen\components;

use yii\log\Target;

class TelegramLogTarget extends Target
{
    public $botToken;
    public $chatId;

    public function export()
    {
        foreach ($this->messages as $message) {

            list($text) = $message;

            if (strpos($text, '$_GET') !== false || strpos($text, '$_POST') !== false) {
                continue;
            }

            $this->sendMessage($text);
        }
    }

    protected function sendMessage($message)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";

        $data = [
            'chat_id' => $this->chatId,
            'text' => $message,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        file_get_contents($url, false, $context);
    }
}