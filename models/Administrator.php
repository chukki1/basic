<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrator".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Email
 * @property string $Password
 * @property int $User_type_Id
 *
 * @property UserType $userType
 * @property AdministratorAddProduct[] $administratorAddProducts
 * @property Product[] $products
 * @property DeleveryNote[] $deleveryNotes
 * @property Shipment[] $shipments
 */
class Administrator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administrator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Password', 'User_type_Id'], 'required'],
            [['User_type_Id'], 'integer'],
            [['Name', 'Email', 'Password'], 'string', 'max' => 45],
            [['Name'], 'unique'],
            [['Password'], 'unique'],
            [['User_type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['User_type_Id' => 'Id']],
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
            'Email' => 'Email',
            'Password' => 'Password',
            'User_type_Id' => 'User Type  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['Id' => 'User_type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministratorAddProducts()
    {
        return $this->hasMany(AdministratorAddProduct::className(), ['Administrator_Id' => 'Id', 'Administrator_User_type_Id' => 'User_type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['Id' => 'Product_Id', 'Subcatagory_Id' => 'Product_Subcatagory_Id', 'Subcatagory_main_category_Id' => 'Product_Subcatagory_main_category_Id', 'Subcatagory_Product_Id' => 'Product_Subcatagory_Product_Id'])->viaTable('administrator_add_product', ['Administrator_Id' => 'Id', 'Administrator_User_type_Id' => 'User_type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeleveryNotes()
    {
        return $this->hasMany(DeleveryNote::className(), ['Administrator_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipments()
    {
        return $this->hasMany(Shipment::className(), ['Administrator_Id' => 'Id']);
    }
}
