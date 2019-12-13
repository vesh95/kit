<?php declare(strict_types=1);

namespace api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return 'hellow';
    }

    public function actionError(): Response
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            $exception = new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        if ($exception instanceof \HttpException) {
            Yii::$app->response->setStatusCode($exception->getCode());
        } else {
            Yii::$app->response->setStatusCode(500);
        }

        return $this->asJson(['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
    }
}