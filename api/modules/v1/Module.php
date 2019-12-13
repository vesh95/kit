<?php

namespace api\modules\v1;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;
use api\modules\v1\models\ApiUserIdentity;

class Module extends \yii\base\Module
{
    /** @var string */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        Yii::$app->user->identityClass = ApiUserIdentity::class;
        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::class,
        ];


        return $behaviors;
    }
}
