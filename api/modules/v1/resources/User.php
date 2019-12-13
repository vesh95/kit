<?php

namespace api\modules\v1\resources;


class User extends \common\models\User
{
    public function fields(): array
    {
        return ['id', 'username', 'created_at'];
    }

    public function extraFields(): array
    {
        return ['userProfile'];
    }
}
