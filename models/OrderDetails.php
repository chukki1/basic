<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property int $order_Id
 * @property int $Product_Id
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
            [['order_Id', 'Product_Id', 'Product_Name', 'Quantity'], 'required'],
            [['order_Id', 'Product_Id', 'Quantity'], 'integer'],
            [['Product_Name'], 'string', 'max' => 100],
            [['order_Id'], 'unique'],
            [['Product_Id'], 'unique'],
            [['order_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_Id' => 'ID']],
            [['Product_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['Product_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_Id' => 'Order  ID',
            'Product_Id' => 'Product  ID',
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
        return $this->hasOne(Product::className(), ['Id' => 'Product_Id']);
    }
}
