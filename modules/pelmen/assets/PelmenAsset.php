<?php

namespace app\modules\pelmen\assets;

use yii\web\AssetBundle;

class PelmenAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/pelmen/assets';

    public $css = [
        'css/style.css',
    ];

    public $depends = [
        'yii\bootstrap5\BootstrapAsset',
    ];
}