<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Flot extends AssetBundle
{
    public $sourcePath = '@bower/flot';

    public $js = [
        'jquery.flot.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}
