<?php

namespace frontend\modules\user\controllers;

use frontend\modules\user\models\LoginForm;
use Yii;
use yii\web\Response;

class SignInController extends \yii\web\Controller
{
    public $layout = 'login';

    /**
     * @return array|string|Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
