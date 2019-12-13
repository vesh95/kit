<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\jui\JuiAsset;
use yii\bootstrap\BootstrapPluginAsset;
use common\assets\FontAwesome;
use common\assets\JquerySlimScroll;

class AdminLte extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';

    public $js = [
        'js/app.min.js'
    ];

    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css'
    ];

    public $depends = [
        JqueryAsset::class,
        JuiAsset::class,
        BootstrapPluginAsset::class,
        FontAwesome::class,
        JquerySlimScroll::class
    ];
}
