<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Esnaf;

/**
 * EsnafSearch represents the model behind the search form of `app\models\Esnaf`.
 */
class EsnafSearch extends Esnaf
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'BOLGE_ID'], 'integer'],
            [['VERGI_NO', 'AD', 'ADRESS'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
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
    public function search($params)
    {
        $query = Esnaf::find();

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
            'ID' => $this->ID,
            'BOLGE_ID' => $this->BOLGE_ID,
        ]);

        $query->andFilterWhere(['like', 'VERGI_NO', $this->VERGI_NO])
            ->andFilterWhere(['like', 'AD', $this->AD])
            ->andFilterWhere(['like', 'ADRESS', $this->ADRESS]);

        return $dataProvider;
    }
}
