<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DeleveryNote;

/**
 * DeleveryNoteSearch represents the model behind the search form of `app\models\DeleveryNote`.
 */
class DeleveryNoteSearch extends DeleveryNote
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Administrator_Id'], 'integer'],
            [['Created_date', 'Discription', 'Customer_Id', 'Status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = DeleveryNote::find();

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
            'Id' => $this->Id,
            'Created_date' => $this->Created_date,
            'Administrator_Id' => $this->Administrator_Id,
        ]);

        $query->andFilterWhere(['like', 'Discription', $this->Discription])
            ->andFilterWhere(['like', 'Customer_Id', $this->Customer_Id])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
