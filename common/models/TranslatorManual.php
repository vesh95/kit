<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "translator_manual".
 *
 * @property int $id
 * @property string $source_words
 * @property string $translated_words
 */
class TranslatorManual extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'translator_manual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['source_words', 'translated_words'], 'string', 'max' => 255],
            [['source_words', 'translated_words'], 'default', 'value' => null],
            [['source_words'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'source_words' => Yii::t('common', 'Source Words'),
            'translated_words' => Yii::t('common', 'Translated Words'),
        ];
    }
}
