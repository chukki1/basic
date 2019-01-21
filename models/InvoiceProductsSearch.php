<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InvoiceProducts;

/**
 * InvoiceProductsSearch represents the model behind the search form of `app\models\InvoiceProducts`.
 */
class InvoiceProductsSearch extends InvoiceProducts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Invoice_Id', 'Product_Id', 'Quantity', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id'], 'integer'],
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
        $query = InvoiceProducts::find();

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
            'Invoice_Id' => $this->Invoice_Id,
            'Product_Id' => $this->Product_Id,
            'Quantity' => $this->Quantity,
            'Product_Subcatagory_Id' => $this->Product_Subcatagory_Id,
            'Product_Subcatagory_main_category_Id' => $this->Product_Subcatagory_main_category_Id,
            'Product_Subcatagory_Product_Id' => $this->Product_Subcatagory_Product_Id,
        ]);

        return $dataProvider;
    }
}
