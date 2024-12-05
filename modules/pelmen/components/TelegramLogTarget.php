<?php

namespace app\modules\pelmen\components;

use yii\log\Target;
use Yii;

class TelegramLogTarget extends Target
{
    public $botToken;

    public function export()
    {
        foreach ($this->messages as $message) {
            // Извлекаем только текстовое сообщение из лог-сообщения
            list($data) = $message;

            if (is_array($data) && count($data) == 2) {
                $telegramNickname = $data[0];
                $text = $data[1];

                // Удаляем лишнюю информацию из текста
                if (strpos($text, '$_GET') !== false || strpos($text, '$_POST') !== false) {
                    continue; // Пропускаем сообщения с ненужной информацией
                }

                // Отправляем сообщение в Telegram
                $this->sendMessage($telegramNickname, $text);
            }
        }
    }

    protected function sendMessage($telegramNickname, $message)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";
        $data = [
            'telegram_nickname' => $telegramNickname,
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
