<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property int $Id
 * @property int $order_Id
 * @property int $product_id
 * @property string $Product_Name
 * @property int $Quantity
 *
 * @property Order $order
 * @property Product $product
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_Id', 'product_id', 'Product_Name', 'Quantity'], 'required'],
            [['order_Id', 'product_id', 'Quantity'], 'integer'],
            [['Product_Name'], 'string', 'max' => 100],
            [['order_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_Id' => 'ID']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'order_Id' => 'Order  ID',
            'product_id' => 'Product ID',
            'Product_Name' => 'Product  Name',
            'Quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['ID' => 'order_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['Id' => 'product_id']);
    }
}
