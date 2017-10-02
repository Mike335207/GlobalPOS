<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kart;

/**
 * KartSearch represents the model behind the search form of `app\models\Kart`.
 */
class KartSearch extends Kart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'BOLGE_ID'], 'integer'],
            [['KART_NO', 'TIP'], 'safe'],
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
        $query = Kart::find();

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

        $query->andFilterWhere(['like', 'KART_NO', $this->KART_NO])
            ->andFilterWhere(['like', 'TIP', $this->TIP]);

        return $dataProvider;
    }
}
