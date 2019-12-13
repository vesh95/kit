<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('app', 'Rbac Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-assignment-index">


    <p>
        <?php echo Html::a(Yii::t('app', 'Create {modelClass}', [
            'modelClass' => 'Rbac Auth Assignment',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],

            'item_name',
            'user_id',
            'created_at:datetime',

            ['class' => ActionColumn::class],
        ],
    ]); ?>

</div>
