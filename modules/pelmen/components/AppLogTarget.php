<?php

namespace app\modules\pelmen\components;

use yii\log\Target;

class AppLogTarget extends Target
{
    public $botToken;
    public $chatId;

    public function export()
    {
        foreach ($this->messages as $message) {
            list($text) = $message;

            if (is_array($text)) {
                $text = $text[0] ?? '';
            }

            if (strpos($text, '$_GET') !== false || strpos($text, '$_POST') !== false) {
                continue;
            }

            $this->sendMessageToLog($text);
        }
    }

    protected function sendMessageToLog($message)
    {
        $logFile = \Yii::getAlias('@app/modules/pelmen/logs/app.log');

        $formattedMessage = date('Y-m-d H:i:s') . " " . $message . PHP_EOL;

        file_put_contents($logFile, $formattedMessage, FILE_APPEND);
    }
}