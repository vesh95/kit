<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class JquerySlimScroll extends AssetBundle
{
    public $sourcePath = '@bower/jquery-slimscroll';

    public $js = [
        'jquery.slimscroll.min.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}
