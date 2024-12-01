<?php

namespace app\modules\pelmen;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\pelmen\controllers';

    public $layout = 'pelmenLayout';

    public function init()
    {
        parent::init();
    }
}