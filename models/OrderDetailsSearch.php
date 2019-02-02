<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderDetails;

/**
 * OrderDetailsSearch represents the model behind the search form of `app\models\OrderDetails`.
 */
class OrderDetailsSearch extends OrderDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'order_Id', 'product_id', 'Quantity'], 'integer'],
            [['Product_Name'], 'safe'],
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
        $query = OrderDetails::find();

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
            'order_Id' => $this->order_Id,
            'product_id' => $this->product_id,
            'Quantity' => $this->Quantity,
        ]);

        $query->andFilterWhere(['like', 'Product_Name', $this->Product_Name]);

        return $dataProvider;
    }
}
