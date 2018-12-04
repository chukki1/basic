<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bill;

/**
 * BillSearch represents the model behind the search form of `app\models\Bill`.
 */
class BillSearch extends Bill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Bill_No', 'code', 'Product_Name'], 'safe'],
            [['price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'integer'],
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
        $query = Bill::find();

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
            'price' => $this->price,
            'Quantity' => $this->Quantity,
            'Discount' => $this->Discount,
            'Total_Discount' => $this->Total_Discount,
            'Total' => $this->Total,
        ]);

        $query->andFilterWhere(['like', 'Bill_No', $this->Bill_No])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'Product_Name', $this->Product_Name]);

        return $dataProvider;
    }
}
