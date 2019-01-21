<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcatagory".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Status
 * @property int $main_category_Id
 * @property int $Product_Id
 *
 * @property Product[] $products
 * @property MainCategory $mainCategory
 */
class Subcatagory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcatagory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Status', 'main_category_Id', 'Product_Id'], 'required'],
            [['main_category_Id', 'Product_Id'], 'integer'],
            [['Name', 'Status'], 'string', 'max' => 45],
            [['main_category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => MainCategory::className(), 'targetAttribute' => ['main_category_Id' => 'Id']],
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
            'Status' => 'Status',
            'main_category_Id' => 'Main Category  ID',
            'Product_Id' => 'Product  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['Subcatagory_Id' => 'Id', 'Subcatagory_main_category_Id' => 'main_category_Id', 'Subcatagory_Product_Id' => 'Product_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainCategory()
    {
        return $this->hasOne(MainCategory::className(), ['Id' => 'main_category_Id']);
    }
}
