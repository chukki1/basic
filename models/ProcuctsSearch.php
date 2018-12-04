<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProcuctsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProcuctsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'subId', 'description', 'promotion', 'supplierName'], 'safe'],
            [['price', 'available_Qty', 'reorder_level', 're'], 'integer'],
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
        $query = Products::find();

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
            'available_Qty' => $this->available_Qty,
            'reorder_level' => $this->reorder_level,
            're' => $this->re,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'subId', $this->subId])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'promotion', $this->promotion])
            ->andFilterWhere(['like', 'supplierName', $this->supplierName]);

        return $dataProvider;
    }
}
