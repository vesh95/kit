<?php

namespace api\modules\v1\controllers;

use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\ServerErrorHttpException;

class AuthController extends Controller
{
    public function actionLogin(): array
    {
        $post = Yii::$app->request->post();

        $username = ArrayHelper::getValue($post, 'login');
        $password = ArrayHelper::getValue($post, 'password');

        $user = User::findOne(['username' => $username]);
        if (!$user) {
            throw new ServerErrorHttpException('Invalid username');
        }

        if ($user->validatePassword($password)) {
            $accessToken = Yii::$app->getSecurity()->generateRandomString(40);
            $user->access_token = $accessToken;
            $user->save();

            return [
                'data' => [
                    'access_token' => $accessToken,
                ],
            ];
        }

        throw new ServerErrorHttpException('Invalid password');
    }
}
