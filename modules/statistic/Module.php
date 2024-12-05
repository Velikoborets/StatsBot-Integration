<?php

namespace app\modules\statistic;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\statistic\controllers';

    public function init()
    {
        parent::init();

        // Проверяем, является ли приложение консольным
        if (Yii::$app instanceof \yii\console\Application) {

            // Указываем пространство имен для команд
            $this->controllerNamespace = 'app\modules\statistic\commands';
        }
    }
}