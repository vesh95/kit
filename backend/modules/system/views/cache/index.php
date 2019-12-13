<?php
/**
 * @var $dataProvider \yii\data\ArrayDataProvider
 */

use yii\bootstrap\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('backend', 'Cache');

$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'class',
        [
            'class' => ActionColumn::class,
            'template' => '{flush-cache}',
            'buttons' => [
                'flush-cache' => function ($url, $model) {
                    return Html::a('<i class="fa fa-refresh"></i>', $url, [
                        'title' => Yii::t('backend', 'Flush'),
                        'data-confirm' => Yii::t('backend', 'Are you sure you want to flush this cache?'),
                    ]);
                },
            ],
        ],
    ],
]); ?>

<div class="row">
    <div class="col-xs-6">
        <h4><?php echo Yii::t('backend', 'Delete a value with the specified key from cache') ?></h4>
        <?php ActiveForm::begin([
            'action' => Url::to('flush-cache-key'),
            'method' => 'get',
            'layout' => 'inline',
        ]) ?>
        <?php echo Html::dropDownList(
            'id', null, ArrayHelper::map($dataProvider->allModels, 'name', 'name'),
            ['class' => 'form-control', 'prompt' => Yii::t('backend', 'Select cache')])
        ?>
        <?php echo Html::input('string', 'key', null, ['class' => 'form-control', 'placeholder' => Yii::t('backend', 'Key')]) ?>
        <?php echo Html::submitButton(Yii::t('backend', 'Flush'), ['class' => 'btn btn-danger']) ?>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-xs-6">
        <h4><?php echo Yii::t('backend', 'Invalidate tag') ?></h4>
        <?php ActiveForm::begin([
            'action' => Url::to('flush-cache-tag'),
            'method' => 'get',
            'layout' => 'inline',
        ]) ?>
        <?php echo Html::dropDownList(
            'id', null, ArrayHelper::map($dataProvider->allModels, 'name', 'name'),
            ['class' => 'form-control', 'prompt' => Yii::t('backend', 'Select cache')]) ?>
        <?php echo Html::input('string', 'tag', null, ['class' => 'form-control', 'placeholder' => Yii::t('backend', 'Tag')]) ?>
        <?php echo Html::submitButton(Yii::t('backend', 'Flush'), ['class' => 'btn btn-danger']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
