<?php

namespace backend\controllers;

use backend\models\AccountForm;
use backend\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SignInController extends Controller
{

    public $defaultAction = 'login';

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post']
                ]
            ]
        ];
    }


    public function actionLogin()
    {
        $this->layout = 'base';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity->userProfile;
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => Yii::t('backend', 'Your profile has been successfully saved', [], $model->locale)
            ]);

            return $this->refresh();
        }

        return $this->render('profile', ['model' => $model]);
    }

    public function actionAccount()
    {
        $user = Yii::$app->user->identity;
        $model = new AccountForm();
        $model->username = $user->username;
        $model->email = $user->email;
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $user->username = $model->username;
            $user->email = $model->email;
            if ($model->password) {
                $user->setPassword($model->password);
            }
            $user->save();
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => Yii::t('backend', 'Your account has been successfully saved')
            ]);

            return $this->refresh();
        }

        return $this->render('account', ['model' => $model]);
    }
}
