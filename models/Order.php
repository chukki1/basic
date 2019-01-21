<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $ID
 * @property string $QR_code
 * @property string $item_name
 * @property string $Quntity
 * @property double $Unit_Price
 * @property double $Total_Price
 * @property string $created_on
 * @property string $issued_by
 * @property string $created_by
 * @property int $Invoice_Id
 * @property int $Delevery_note_Id
 * @property int $Customer_Id
 * @property int $Cashier_Id
 *
 * @property Cashier $cashier
 * @property Customer $customer
 * @property DeleveryNote $deleveryNote
 * @property Invoice $invoice
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
            [['QR_code', 'item_name', 'Quntity', 'Unit_Price', 'Total_Price', 'created_on', 'issued_by', 'created_by', 'Invoice_Id', 'Delevery_note_Id', 'Customer_Id', 'Cashier_Id'], 'required'],
            [['Unit_Price', 'Total_Price'], 'number'],
            [['created_on', 'issued_by', 'created_by'], 'safe'],
            [['Invoice_Id', 'Delevery_note_Id', 'Customer_Id', 'Cashier_Id'], 'integer'],
            [['QR_code', 'item_name', 'Quntity'], 'string', 'max' => 45],
            [['Cashier_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Cashier::className(), 'targetAttribute' => ['Cashier_Id' => 'Id']],
            [['Customer_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['Customer_Id' => 'Id']],
            [['Delevery_note_Id'], 'exist', 'skipOnError' => true, 'targetClass' => DeleveryNote::className(), 'targetAttribute' => ['Delevery_note_Id' => 'Id']],
            [['Invoice_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['Invoice_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'QR_code' => 'QR_code',
            'item_name' => 'Item Name',
            'Quntity' => 'Quntity',
            'Unit_Price' => 'Unit  Price',
            'Total_Price' => 'Total  Price',
            'created_on' => 'Created On',
            'issued_by' => 'Issued By',
            'created_by' => 'Created By',
            'Invoice_Id' => 'Invoice  ID',
            'Delevery_note_Id' => 'Delevery Note  ID',
            'Customer_Id' => 'Customer  ID',
            'Cashier_Id' => 'Cashier  ID',
        ];
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
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['Id' => 'Customer_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeleveryNote()
    {
        return $this->hasOne(DeleveryNote::className(), ['Id' => 'Delevery_note_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['Id' => 'Invoice_Id']);
    }
}
