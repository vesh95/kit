<?php

namespace common\models;

use common\jobs\ParserJob;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "translator_parser".
 *
 * @property int $id
 * @property string $source_name
 * @property string $source_brand
 * @property string $translated_name
 * @property string $translated_brand
 * @property int $gender
 * @property int $status
 * @property bool $manual
 *
 * @property string $sourceTitle
 * @property string $translatedTitle
 * @property array $genderList
 * @property array $signsByGender
 * @property TranslatorParserLog $log
 * @property array $statusList
 */
class TranslatorParser extends ActiveRecord
{
    public const GENDER_MALE = 0;
    public const GENDER_FEMALE = 1;
    public const GENDER_UNKNOWN = 2;

    public const STATUS_PLANNED = 0;
    public const STATUS_TRANSLATED = 1;
    public const STATUS_NOT_FOUND = 2;

    public static $femaleGenderSigns = [
        'pour femme',
        'for women',
        'woman',
        'for her',
    ];

    public static $maleGenderSigns = [
        'pour homme',
        'for men',
        'man',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'translator_parser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['gender', 'status', 'source_name', 'source_brand', 'translated_name', 'translated_brand'], 'default', 'value' => null],
            [['gender', 'status'], 'integer'],
            [['manual'], 'boolean'],
            [['manual'], 'default', 'value' => false],
            [['source_name', 'source_brand', 'translated_name', 'translated_brand'], 'string', 'max' => 255],
            [['source_name', 'source_brand'], 'required'],
            [['source_name', 'source_brand', 'gender'], 'unique', 'targetAttribute' => ['source_name', 'source_brand', 'gender']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'source_name' => Yii::t('common', 'Source Name'),
            'source_brand' => Yii::t('common', 'Source Brand'),
            'translated_name' => Yii::t('common', 'Translated Name'),
            'translated_brand' => Yii::t('common', 'Translated Brand'),
            'gender' => Yii::t('common', 'Gender'),
            'status' => Yii::t('common', 'Status'),
            'manual' => Yii::t('common', 'Manual'),
        ];
    }

    public function beforeSave($insert): bool
    {
        $this->setStatus();

        if ($insert === false
            && $this->isAttributeChanged('translated_name')
            && $this->isAttributeChanged('translated_brand')
            && $this->status !== self::STATUS_TRANSLATED) {
            $this->manual = true;
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            Yii::$app->queue->push(new ParserJob([
                'id' => $this->id,
            ]));
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return ActiveQuery
     */
    public function getLog(): ActiveQuery
    {
        return $this->hasOne(TranslatorParserLog::class, ['parser_id' => 'id']);
    }

    public function getSourceTitle(): string
    {
        return implode(' ', [trim($this->source_brand), trim($this->source_name)]);
    }

    public function getTranslatedTitle(): string
    {
        return implode(' ', [$this->translated_brand, $this->translated_name]);
    }

    private function setStatus(): void
    {
        if ($this->isNewRecord) {
            $this->status = self::STATUS_PLANNED;
        } else if ($this->manual && $this->status === self::STATUS_NOT_FOUND && $this->translated_brand && $this->translated_name) {
            $this->status = self::STATUS_TRANSLATED;
        }
    }

    public static function getGenderList(): array
    {
        return [
            self::GENDER_MALE => Yii::t('common', 'Male'),
            self::GENDER_FEMALE => Yii::t('common', 'Female'),
            self::GENDER_UNKNOWN => Yii::t('common', 'Unisex'),
        ];
    }

    public static function getStatusList(): array
    {
        return [
            self::STATUS_PLANNED => Yii::t('common', 'Planned'),
            self::STATUS_TRANSLATED => Yii::t('common', 'Translated'),
            self::STATUS_NOT_FOUND => Yii::t('common', 'Not found'),
        ];
    }

    public function getSignsByGender(): array
    {
        if ((int)$this->gender === self::GENDER_FEMALE) {
            return self::$femaleGenderSigns;
        }

        if ((int)$this->gender === self::GENDER_MALE) {
            return self::$maleGenderSigns;
        }

        return [];
    }
}
