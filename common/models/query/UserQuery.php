<?php

namespace common\models\query;

use common\models\User;
use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function notDeleted(): self
    {
        $this->andWhere(['!=', 'status', User::STATUS_DELETED]);

        return $this;
    }

    /**
     * @return $this
     */
    public function active(): self
    {
        $this->andWhere(['status' => User::STATUS_ACTIVE]);

        return $this;
    }
}