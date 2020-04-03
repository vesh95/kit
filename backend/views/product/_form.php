<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Tag;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'id', 'title')
    );
    ?>

    <?php //print_r(ArrayHelper::getColumn($model->tags, 'id')) ?>
    <?php //print_r($model->tags) ?>
    <?php //print_r($model->tag_ids) ?>
    <?php //print_r(ArrayHelper::map(Tag::find()->all(), 'id', 'title')) ?>

    <?php echo $form->field($model, 'tag_ids')->widget(Select2::class, [
        'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'title'),
        // 'value' => ArrayHelper::map(Tag::find()->all(), 'id', 'title'),
        'options' => [
            'tags' => true,
            'multiple' => true,
        ],
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
