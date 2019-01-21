<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $Id
 * @property string $Issued_date
 * @property string $Issued_by
 *  @property string $status
 *
 * @property InvoiceHasProduct[] $invoiceHasProducts
 * @property Product[] $products
 * @property Order[] $orders
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
            [['Issued_date','issued_by'], 'required'],
            [['Issued_by','status'],'string'],
            [['Issued_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Issued_date' => 'Issued Date',
            'Issued_by' => 'Issued By',
            'status'=>'status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceHasProducts()
    {
        return $this->hasMany(InvoiceHasProduct::className(), ['Invoice_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['Id' => 'Product_Id', 'Subcatagory_Id' => 'Product_Subcatagory_Id', 'Subcatagory_main_category_Id' => 'Product_Subcatagory_main_category_Id', 'Subcatagory_Product_Id' => 'Product_Subcatagory_Product_Id'])->viaTable('invoice_has_product', ['Invoice_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Invoice_Id' => 'Id']);
    }
}
