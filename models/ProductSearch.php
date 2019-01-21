<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Subcatagory_Id', 'Subcatagory_main_category_Id', 'Subcatagory_Product_Id'], 'integer'],
            [['Name', 'Available_quntity', 'Reorder_level', 'Description', 'Price'], 'safe'],
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
        $query = Product::find();

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
            'Subcatagory_Id' => $this->Subcatagory_Id,
            'Subcatagory_main_category_Id' => $this->Subcatagory_main_category_Id,
            'Subcatagory_Product_Id' => $this->Subcatagory_Product_Id,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Available_quntity', $this->Available_quntity])
            ->andFilterWhere(['like', 'Reorder_level', $this->Reorder_level])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Price', $this->Price]);

        return $dataProvider;
    }
}
