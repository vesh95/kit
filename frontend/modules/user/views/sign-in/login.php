<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 * @var $model \frontend\modules\user\models\LoginForm
 */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" style="margin-top:70px;">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php echo $form->field($model, 'identity') ?>
                <?php echo $form->field($model, 'password')->passwordInput() ?>
                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

