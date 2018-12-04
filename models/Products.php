<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $code
 * @property string $name
 * @property int $price
 * @property int $available_Qty
 * @property int $reorder_level
 * @property int $re
 * @property string $subId
 * @property string $description
 * @property string $promotion
 * @property string $supplierName
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'price', 'available_Qty', 'reorder_level', 're', 'subId', 'description', 'promotion', 'supplierName'], 'required'],
            [['price', 'available_Qty', 'reorder_level', 're'], 'integer'],
            [['code', 'name', 'subId', 'description', 'promotion', 'supplierName'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'price' => 'Price',
            'available_Qty' => 'Available  Qty',
            'reorder_level' => 'Reorder Level',
            're' => 'Re',
            'subId' => 'Sub ID',
            'description' => 'Description',
            'promotion' => 'Promotion',
            'supplierName' => 'Supplier Name',
        ];
    }
}
