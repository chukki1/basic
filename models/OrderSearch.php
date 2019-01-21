<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Invoice_Id', 'Delevery_note_Id', 'Customer_Id', 'Cashier_Id'], 'integer'],
            [['QR_code', 'item_name', 'Quntity', 'created_on', 'issued_by', 'created_by'], 'safe'],
            [['Unit_Price', 'Total_Price'], 'number'],
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
        $query = Order::find();

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
            'Unit_Price' => $this->Unit_Price,
            'Total_Price' => $this->Total_Price,
            'created_on' => $this->created_on,
            'issued_by' => $this->issued_by,
            'created_by' => $this->created_by,
            'Invoice_Id' => $this->Invoice_Id,
            'Delevery_note_Id' => $this->Delevery_note_Id,
            'Customer_Id' => $this->Customer_Id,
            'Cashier_Id' => $this->Cashier_Id,
        ]);

        $query->andFilterWhere(['like', 'QR_code', $this->QR_code])
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'Quntity', $this->Quntity]);

        return $dataProvider;
    }
}
