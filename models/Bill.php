<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bill".
 *
 * @property string $Bill_No
 * @property string $code
 * @property string $Product_Name
 * @property int $price
 * @property int $Quantity
 * @property int $Discount
 * @property int $Total_Discount
 * @property int $Total
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Bill_No', 'code', 'Product_Name', 'price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'required'],
            [['price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'integer'],
            [['Bill_No', 'code', 'Product_Name'], 'string', 'max' => 100],
            [['Bill_No'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Bill_No' => 'Bill  No',
            'code' => 'Code',
            'Product_Name' => 'Product  Name',
            'price' => 'Price',
            'Quantity' => 'Quantity',
            'Discount' => 'Discount',
            'Total_Discount' => 'Total  Discount',
            'Total' => 'Total',
        ];
    }
}
