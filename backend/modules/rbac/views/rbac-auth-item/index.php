<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use common\grid\EnumColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\rbac\Item;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('frontend', 'Rbac Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-item-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('frontend', 'Create Rbac Auth Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],

            'name',
            [
                'class' => EnumColumn::class,
                'attribute' => 'type',
                'enum' => [
                    Item::TYPE_ROLE => 'role',
                    Item::TYPE_PERMISSION => 'permission',
                ]
            ],
            'description:ntext',
            'rule_name',
            'data',

            ['class' => ActionColumn::class],
        ],
    ]); ?>
</div>
