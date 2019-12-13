<?php

namespace common\jobs;


use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;

/**
 * @package common\jobs
 */
class ParserJob extends BaseObject implements JobInterface
{
    public $id;

    public function execute($queue)
    {
        Yii::$app->runAction('parser/index', [$this->id]);
    }
}
