<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receipt;

/**
 * ReceiptSearch represents the model behind the search form of `app\models\Receipt`.
 */
class ReceiptSearch extends Receipt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_it_no', 'receiptNo_id'], 'integer'],
            [['Product_Name'], 'safe'],
            [['Price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'number'],
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
        $query = Receipt::find();

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
            'product_it_no' => $this->product_it_no,
            'Price' => $this->Price,
            'Quantity' => $this->Quantity,
            'Discount' => $this->Discount,
            'Total_Discount' => $this->Total_Discount,
            'Total' => $this->Total,
            'receiptNo_id' => $this->receiptNo_id,
        ]);

        $query->andFilterWhere(['like', 'Product_Name', $this->Product_Name]);

        return $dataProvider;
    }
}
