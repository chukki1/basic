<?php

namespace app\models;

use Yii;
use mdm\behaviors\ar\RelationTrait;
/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $order_id
 * @property string $product
 * @property double $price
 * @property int $qty
 * @property double $discount
 * @property double $total_discount
 * @property double $total
 *
 * @property Order $order
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product', 'price', 'qty', 'discount', 'total_discount', 'total'], 'required'],
            [['id', 'order_id', 'qty'], 'integer'],
            [['price', 'discount', 'total_discount', 'total'], 'number'],
            [['product'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product' => 'Product',
            'price' => 'Price',
            'qty' => 'Qty',
            'discount' => 'Discount',
            'total_discount' => 'Total Discount',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
