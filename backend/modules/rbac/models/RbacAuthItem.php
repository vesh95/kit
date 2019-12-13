<?php

namespace backend\modules\rbac\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rbac_auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property resource $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property RbacAuthAssignment[] $rbacAuthAssignments
 * @property RbacAuthRule $ruleName
 * @property RbacAuthItemChild[] $rbacAuthItemChildren
 * @property RbacAuthItemChild[] $rbacAuthItemChildren0
 * @property RbacAuthItem[] $children
 * @property RbacAuthItem[] $parents
 */
class RbacAuthItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%rbac_auth_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => RbacAuthRule::class, 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthAssignments(): ActiveQuery
    {
        return $this->hasMany(RbacAuthAssignment::class, ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName(): ActiveQuery
    {
        return $this->hasOne(RbacAuthRule::class, ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthItemChildren(): ActiveQuery
    {
        return $this->hasMany(RbacAuthItemChild::class, ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthItemChildren0(): ActiveQuery
    {
        return $this->hasMany(RbacAuthItemChild::class, ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getChildren(): ActiveQuery
    {
        return $this->hasMany(RbacAuthItem::class, ['name' => 'child'])->viaTable('rbac_auth_item_child', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getParents(): ActiveQuery
    {
        return $this->hasMany(RbacAuthItem::class, ['name' => 'parent'])->viaTable('rbac_auth_item_child', ['child' => 'name']);
    }
}
