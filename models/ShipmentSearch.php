<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shipment;

/**
 * ShipmentSearch represents the model behind the search form of `app\models\Shipment`.
 */
class ShipmentSearch extends Shipment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Administrator_Id', 'Quantity'], 'integer'],
            [['Discription', 'Suplier', 'Date', 'Time', 'Item_Id'], 'safe'],
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
        $query = Shipment::find();

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
            'Administrator_Id' => $this->Administrator_Id,
            'Date' => $this->Date,
            'Time' => $this->Time,
            'Quantity' => $this->Quantity,
        ]);

        $query->andFilterWhere(['like', 'Discription', $this->Discription])
            ->andFilterWhere(['like', 'Suplier', $this->Suplier])
            ->andFilterWhere(['like', 'Item_Id', $this->Item_Id]);

        return $dataProvider;
    }
}
