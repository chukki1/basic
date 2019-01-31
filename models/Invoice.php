<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $Id
 * @property string $Date
 * @property string $Time
 * @property int $Invoice_Id
 * @property int $Cashier_Id
 * @property int $Customer_Id
 * @property string $Net_Total
 * @property int $No_Of_Items
 * @property string $Discount
 * @property string $Total_Amount
 * @property string $Paid
 * @property string $Balance
 *
 * @property Customer $customer
 * @property Cashier $cashier
 * @property InvoiceHasProduct[] $invoiceHasProducts
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Date', 'Time', 'Invoice_Id', 'Cashier_Id', 'Customer_Id', 'Net_Total', 'No_Of_Items', 'Discount', 'Total_Amount', 'Paid', 'Balance'], 'required'],
            [['Date', 'Time'], 'safe'],
            [['Invoice_Id', 'Cashier_Id', 'Customer_Id', 'No_Of_Items'], 'integer'],
            [['Net_Total', 'Discount', 'Total_Amount', 'Paid', 'Balance'], 'number'],
            [['Customer_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['Customer_Id' => 'Id']],
            [['Cashier_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Cashier::className(), 'targetAttribute' => ['Cashier_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Date' => 'Date',
            'Time' => 'Time',
            'Invoice_Id' => 'Invoice  ID',
            'Cashier_Id' => 'Cashier  ID',
            'Customer_Id' => 'Customer  ID',
            'Net_Total' => 'Net  Total',
            'No_Of_Items' => 'No  Of  Items',
            'Discount' => 'Discount',
            'Total_Amount' => 'Total  Amount',
            'Paid' => 'Paid',
            'Balance' => 'Balance',
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
    public function getCashier()
    {
        return $this->hasOne(Cashier::className(), ['Id' => 'Cashier_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceHasProducts()
    {
        return $this->hasMany(InvoiceHasProduct::className(), ['Invoice_Id' => 'Id']);
    }
}
