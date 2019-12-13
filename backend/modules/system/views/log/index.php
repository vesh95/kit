<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use trntv\yii\datetime\DateTimeWidget;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\log\Logger;
use yii\web\JsExpression;

/**
 * @var $this yii\web\View
 * @var $searchModel backend\modules\system\models\search\SystemLogSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('backend', 'System Logs');

$this->params['breadcrumbs'][] = $this->title;

?>

<p>
    <?php echo Html::a(Yii::t('backend', 'Clear'), false, ['class' => 'btn btn-danger', 'data-method' => 'delete']) ?>
</p>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'options' => [
        'class' => 'grid-view table-responsive',
    ],
    'columns' => [
        ['class' => SerialColumn::class],
        [
            'attribute' => 'level',
            'value' => function ($model) {
                return Logger::getLevelName($model->level);
            },
            'filter' => [
                Logger::LEVEL_ERROR => 'error',
                Logger::LEVEL_WARNING => 'warning',
                Logger::LEVEL_INFO => 'info',
                Logger::LEVEL_TRACE => 'trace',
                Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                Logger::LEVEL_PROFILE_END => 'profile end',
            ],
        ],
        'category',
        'prefix',
        [
            'attribute' => 'log_time',
            'format' => 'datetime',
            'value' => function ($model) {
                return (int)$model->log_time;
            },
            'filter' => DateTimeWidget::widget([
                'model' => $searchModel,
                'attribute' => 'log_time',
                'phpDatetimeFormat' => 'dd.MM.yyyy',
                'momentDatetimeFormat' => 'DD.MM.YYYY',
                'clientEvents' => [
                    'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")'),
                ],
            ]),
        ],

        [
            'class' => ActionColumn::class,
            'template' => '{view} {delete}',
        ],
    ],
]); ?>
