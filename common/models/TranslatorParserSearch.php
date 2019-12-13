<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TranslatorParser;

/**
 * TranslatorParserSearch represents the model behind the search form of `common\models\TranslatorParser`.
 */
class TranslatorParserSearch extends TranslatorParser
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'gender', 'status'], 'integer'],
            [['source_name', 'source_brand', 'translated_name', 'translated_brand'], 'safe'],
            [['manual'], 'boolean'],
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
        $query = TranslatorParser::find()
            ->with('log');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gender' => $this->gender,
            'status' => $this->status,
            'manual' => $this->manual,
        ]);

        $query->andFilterWhere(['ilike', 'source_name', $this->source_name])
            ->andFilterWhere(['ilike', 'source_brand', $this->source_brand])
            ->andFilterWhere(['ilike', 'translated_name', $this->translated_name])
            ->andFilterWhere(['ilike', 'translated_brand', $this->translated_brand]);

        return $dataProvider;
    }
}
