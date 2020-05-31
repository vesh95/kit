<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model backend\models\CategoryCsvForm */
/* @var $form yii\bootstrap\ActiveForm */
$this->title = Yii::t('backend', 'Importing {modelClass}', [
    'modelClass' => 'Category',
  ]);
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'csvFile')->fileInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Import'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
