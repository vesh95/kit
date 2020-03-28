<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tag */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Tag',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
