<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_list".
 *
 * @property int $Id
 * @property int $product_id
 * @property int $quantity
 * @property double $Discount
 * @property double $Total
 */
class ProductList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'Discount', 'Total'], 'required'],
            [['product_id', 'quantity'], 'integer'],
            [['Discount', 'Total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'Discount' => 'Discount',
            'Total' => 'Total',
        ];
    }
}
