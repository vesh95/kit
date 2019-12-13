<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => env('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV
        ]
    ],
];

$dockerNetworks = [];
for ($i = 17; $i < 32; $i++) {
    $dockerNetworks[] = "172.$i.0.*";
}

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => \yii\helpers\ArrayHelper::merge(
            [
                '127.0.0.1',
                '::1',
                '192.168.33.1',
                '172.17.42.1',
                '192.168.99.1'
            ],
            $dockerNetworks
        )
    ];
}

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'allowedIPs' => \yii\helpers\ArrayHelper::merge(
            [
                '127.0.0.1',
                '::1',
                '192.168.33.1',
                '172.17.42.1',
                '192.168.99.1'
            ],
            $dockerNetworks
        )
    ];
}

return $config;
