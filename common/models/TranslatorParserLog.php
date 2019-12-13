<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "translator_parser_log".
 *
 * @property int $id
 * @property int $parser_id
 * @property string $words
 *
 * @property TranslatorParser $parser
 */
class TranslatorParserLog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'translator_parser_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parser_id'], 'default', 'value' => null],
            [['parser_id'], 'integer'],
            [['words'], 'string'],
            [['parser_id'], 'exist', 'skipOnError' => true, 'targetClass' => TranslatorParser::class, 'targetAttribute' => ['parser_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'parser_id' => Yii::t('common', 'Parser ID'),
            'words' => Yii::t('common', 'Words'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getParser(): ActiveQuery
    {
        return $this->hasOne(TranslatorParser::class, ['id' => 'parser_id']);
    }
}
