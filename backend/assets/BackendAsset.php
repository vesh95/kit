<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use common\assets\AdminLte;
use common\assets\Html5shiv;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css'
    ];
    public $js = [
        'js/app.js'
    ];

    public $depends = [
        YiiAsset::class,
        AdminLte::class,
        Html5shiv::class
    ];
}
