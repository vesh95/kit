<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TranslatorParserLogSearch represents the model behind the search form of `common\models\TranslatorParserLog`.
 */
class TranslatorParserLogSearch extends TranslatorParserLog
{

    public $source_name;

    public $source_brand;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'parser_id'], 'integer'],
            [['source_brand', 'source_name'], 'string'],
            [['words'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $translatorParserTable = TranslatorParser::tableName();

        $query = TranslatorParserLog::find()
            ->joinWith('parser');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'source_brand',
                    'source_name',
                    'words',
                    'id'
                ],
                'defaultOrder' => ['id' => SORT_DESC]
            ],
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['ilike', 'words', $this->words]);
        $query->andFilterWhere(['ilike', $translatorParserTable . '.source_brand', $this->source_brand]);
        $query->andFilterWhere(['ilike', $translatorParserTable . '.source_name', $this->source_name]);

        return $dataProvider;
    }
}
