<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Description
 * @property string $Price
 * @property int $Subcatagory_Id
 *
 * @property AdministratorAddProduct[] $administratorAddProducts
 * @property Administrator[] $administrators
 * @property Subcatagory $subcatagory
 * @property ProductHasPromotion[] $productHasPromotions
 * @property Promotion[] $promotions
 * @property ProductHasShipment[] $productHasShipments
 * @property Shipment[] $shipments
 * @property ProductQty[] $productQties
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
            [['Name', 'Price', 'Subcatagory_Id'], 'required'],
            [['Description'], 'string'],
            [['Subcatagory_Id'], 'integer'],
            [['Name', 'Price'], 'string', 'max' => 45],
            [['Subcatagory_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcatagory::className(), 'targetAttribute' => ['Subcatagory_Id' => 'Id']],
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
            'Description' => 'Description',
            'Price' => 'Price',
            'Subcatagory_Id' => 'Subcatagory  ID',
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
    public function getSubcatagory()
    {
        return $this->hasOne(Subcatagory::className(), ['Id' => 'Subcatagory_Id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductQties()
    {
        return $this->hasMany(ProductQty::className(), ['product_id' => 'Id']);
    }
}
