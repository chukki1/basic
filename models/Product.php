<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Available_quntity
 * @property string $Reorder_level
 * @property string $Description
 * @property string $Price
 * @property int $Subcatagory_Id
 * @property int $Subcatagory_main_category_Id
 * @property int $Subcatagory_Product_Id
 *
 * @property AdministratorAddProduct[] $administratorAddProducts
 * @property Administrator[] $administrators
 * @property InvoiceHasProduct[] $invoiceHasProducts
 * @property Invoice[] $invoices
 * @property Subcatagory $subcatagory
 * @property ProductHasPromotion[] $productHasPromotions
 * @property Promotion[] $promotions
 * @property ProductHasShipment[] $productHasShipments
 * @property Shipment[] $shipments
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Available_quntity', 'Reorder_level', 'Price', 'Subcatagory_Id', 'Subcatagory_main_category_Id', 'Subcatagory_Product_Id'], 'required'],
            [['Description'], 'string'],
            [['Subcatagory_Id', 'Subcatagory_main_category_Id', 'Subcatagory_Product_Id'], 'integer'],
            [['Name', 'Available_quntity', 'Reorder_level', 'Price'], 'string', 'max' => 45],
            [['Subcatagory_Id', 'Subcatagory_main_category_Id', 'Subcatagory_Product_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcatagory::className(), 'targetAttribute' => ['Subcatagory_Id' => 'Id', 'Subcatagory_main_category_Id' => 'main_category_Id', 'Subcatagory_Product_Id' => 'Product_Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Available_quntity' => 'Available Quntity',
            'Reorder_level' => 'ReOrder Level',
            'Description' => 'Description',
            'Price' => 'Price',
            'Subcatagory_Id' => 'Subcatagory  ID',
            'Subcatagory_main_category_Id' => 'Subcatagory Main Category  ID',
            'Subcatagory_Product_Id' => 'Subcatagory  Product  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministratorAddProducts()
    {
        return $this->hasMany(AdministratorAddProduct::className(), ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrators()
    {
        return $this->hasMany(Administrator::className(), ['Id' => 'Administrator_Id', 'User_type_Id' => 'Administrator_User_type_Id'])->viaTable('administrator_add_product', ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceHasProducts()
    {
        return $this->hasMany(InvoiceHasProduct::className(), ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['Id' => 'Invoice_Id'])->viaTable('invoice_has_product', ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcatagory()
    {
        return $this->hasOne(Subcatagory::className(), ['Id' => 'Subcatagory_Id', 'main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasPromotions()
    {
        return $this->hasMany(ProductHasPromotion::className(), ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotions()
    {
        return $this->hasMany(Promotion::className(), ['Id' => 'Promotion_Id'])->viaTable('product_has_promotion', ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasShipments()
    {
        return $this->hasMany(ProductHasShipment::className(), ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipments()
    {
        return $this->hasMany(Shipment::className(), ['Id' => 'Shipment_Id'])->viaTable('product_has_shipment', ['Product_Id' => 'Id', 'Product_Subcatagory_Id' => 'Subcatagory_Id', 'Product_Subcatagory_main_category_Id' => 'Subcatagory_main_category_Id', 'Product_Subcatagory_Product_Id' => 'Subcatagory_Product_Id']);
    }
}
