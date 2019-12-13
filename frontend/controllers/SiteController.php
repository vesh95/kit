<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
