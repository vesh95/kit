<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

$cache = [
    'class' => yii\caching\FileCache::class,
    'cachePath' => '@api/runtime/cache'
];


return $cache;
