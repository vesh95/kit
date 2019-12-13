<?php

use common\components\keyStorage\FormWidget;
use yii\bootstrap\ActiveForm;

/**
 * @var $model \common\components\keyStorage\FormModel
 */

$this->title = Yii::t('backend', 'Application settings');

?>

<?php echo FormWidget::widget([
    'model' => $model,
    'formClass' => ActiveForm::class,
    'submitText' => Yii::t('backend', 'Save'),
    'submitOptions' => ['class' => 'btn btn-primary'],
]) ?>
