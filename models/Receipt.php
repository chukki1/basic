<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property int $id
 * @property int $product_it_no
 * @property string $Product_Name
 * @property double $Price
 * @property double $Quantity
 * @property double $Discount
 * @property double $Total_Discount
 * @property double $Total
 * @property int $receiptNo_id
 *
 * @property Receiptno $receiptNo
 * @property ReceiptDetail[] $receiptDetails
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_it_no', 'Price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'required'],
            [['product_it_no', 'receiptNo_id'], 'integer'],
            [['Price', 'Quantity', 'Discount', 'Total_Discount', 'Total'], 'number'],
            [['Product_Name'], 'string', 'max' => 255],
            [['receiptNo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receiptno::className(), 'targetAttribute' => ['receiptNo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_it_no' => 'Product It No',
            'Product_Name' => 'Product  Name',
            'Price' => 'Price',
            'Quantity' => 'Quantity',
            'Discount' => 'Discount',
            'Total_Discount' => 'Total  Discount',
            'Total' => 'Total',
            'receiptNo_id' => 'Receipt No ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptNo()
    {
        return $this->hasOne(Receiptno::className(), ['id' => 'receiptNo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptDetails()
    {
        return $this->hasMany(ReceiptDetail::className(), ['receipt_id' => 'id']);
    }
}
