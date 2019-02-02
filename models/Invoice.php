<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $Id
 * @property string $Date
 * @property int $Cashier_Id
 * @property int $Customer_Id
 * @property string $Net_Total
 * @property int $No_Of_Items
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
            [['Date', 'Cashier_Id', 'Customer_Id', 'Net_Total', 'No_Of_Items', 'Paid', 'Balance'], 'required'],
            [['Date'], 'safe'],
            [['Cashier_Id', 'Customer_Id', 'No_Of_Items'], 'integer'],
            [['Net_Total', 'Paid', 'Balance'], 'number'],
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
            'Cashier_Id' => 'Cashier  ID',
            'Customer_Id' => 'Customer  ID',
            'Net_Total' => 'Net  Total',
            'No_Of_Items' => 'No  Of  Items',
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
