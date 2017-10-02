<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vatandas;

/**
 * VatandasSearch represents the model behind the search form of `app\models\Vatandas`.
 */
class VatandasSearch extends Vatandas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'BOLGE_ID'], 'integer'],
            [['TC_NO', 'AD', 'SOYAD', 'DOGUM_TARIHI'], 'safe'],
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
        $query = Vatandas::find();

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
            'DOGUM_TARIHI' => $this->DOGUM_TARIHI,
            'BOLGE_ID' => $this->BOLGE_ID,
        ]);

        $query->andFilterWhere(['like', 'TC_NO', $this->TC_NO])
            ->andFilterWhere(['like', 'AD', $this->AD])
            ->andFilterWhere(['like', 'SOYAD', $this->SOYAD]);

        return $dataProvider;
    }
}
