<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Talimat;

/**
 * TalimatSearch represents the model behind the search form of `app\models\Talimat`.
 */
class TalimatSearch extends Talimat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'KULLANICI_ID'], 'integer'],
            [['TARIH', 'TALIMAT_TARIH', 'ACIKLAMA'], 'safe'],
            [['TUTAR'], 'number'],
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
        $query = Talimat::find();

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
            'TARIH' => $this->TARIH,
            'TALIMAT_TARIH' => $this->TALIMAT_TARIH,
            'TUTAR' => $this->TUTAR,
            'KULLANICI_ID' => $this->KULLANICI_ID,
        ]);

        $query->andFilterWhere(['like', 'ACIKLAMA', $this->ACIKLAMA]);

        return $dataProvider;
    }
}
