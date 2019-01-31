<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'User_type_Id'], 'integer'],
            [['Name', 'Email', 'Password', 'NIC', 'Reemed_points', 'Earned-point', 'Point_balance', 'Mobile_No'], 'safe'],
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
        $query = Customer::find();

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
            'User_type_Id' => $this->User_type_Id,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'NIC', $this->NIC])
            ->andFilterWhere(['like', 'Reemed_points', $this->Reemed_points])
            //->andFilterWhere(['like', 'Earned-point', $this->Earned-point])
            ->andFilterWhere(['like', 'Point_balance', $this->Point_balance])
            ->andFilterWhere(['like', 'Mobile_No', $this->Mobile_No]);

        return $dataProvider;
    }
}
