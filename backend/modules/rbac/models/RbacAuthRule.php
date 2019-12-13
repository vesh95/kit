<?php

namespace backend\modules\rbac\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rbac_auth_rule".
 *
 * @property string $name
 * @property resource $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property RbacAuthItem[] $rbacAuthItems
 */
class RbacAuthRule extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%rbac_auth_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthItems(): ActiveQuery
    {
        return $this->hasMany(RbacAuthItem::class, ['rule_name' => 'name']);
    }
}
