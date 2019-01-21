<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice_has_product".
 *
 * @property int $Invoice_Id
 * @property int $Product_Id
 * @property int $Quantity
 * @property int $Product_Subcatagory_Id
 * @property int $Product_Subcatagory_main_category_Id
 * @property int $Product_Subcatagory_Product_Id
 * @property Invoice $invoice
 * @property Product $product
 */
class InvoiceProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_has_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Product_Id', 'Quantity', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id'], 'required'],
            [['Invoice_Id', 'Product_Id', 'Quantity', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id'], 'integer'],
            [['Invoice_Id', 'Product_Id', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id'], 'unique', 'targetAttribute' => ['Invoice_Id', 'Product_Id', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id']],
            [['Invoice_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['Invoice_Id' => 'Id']],
            [['Product_Id', 'Product_Subcatagory_Id', 'Product_Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Invoice_Id' => 'Invoice  ID',
            'Product_Id' => 'Product  ID',
            'Quantity' => 'Quantity',
            'Product_Subcatagory_Id' => 'Product  Subcatagory  ID',
            'Product_Subcatagory_main_category_Id' => 'Product  Subcatagory Main Category  ID',
            'Product_Subcatagory_Product_Id' => 'Product  Subcatagory  Product  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['Id' => 'Invoice_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['Id' => 'Product_Id', 'Subcatagory_Id' => 'Product_Subcatagory_Id', 'Subcatagory_main_category_Id' => 'Product_Subcatagory_main_category_Id', 'Subcatagory_Product_Id' => 'Product_Subcatagory_Product_Id']);
    }
}
