<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $ID
 * @property int $Customer_Id
 * @property string $Date
 * @property string $Time
 * @property string $QR_code
 *
 * @property Customer $customer
 * @property OrderDetails[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Customer_Id', 'Date', 'Time', 'QR_code'], 'required'],
            [['Customer_Id'], 'integer'],
            [['Date', 'Time'], 'safe'],
            [['QR_code'], 'string', 'max' => 100],
            [['Customer_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['Customer_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Customer_Id' => 'Customer  ID',
            'Date' => 'Date',
            'Time' => 'Time',
            'QR_code' => 'Qr Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['Id' => 'Customer_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetails::className(), ['order_Id' => 'ID']);
    }
}
