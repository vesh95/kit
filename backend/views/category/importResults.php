<?php

use yii\helpers\Html;

/* @var model backend\models\CategoryCsvForm */

$this->title = Yii::t('backend', 'Import {modelClass} results', [
    'modelClass' => 'Category',
  ]);
?>
<ul>
    <?php foreach ($model->categories as $category): ?>
        <li><?= $category->title ?></li>
    <?php endforeach; ?>
</ul>
