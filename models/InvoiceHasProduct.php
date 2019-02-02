<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice_has_product".
 *
 * @property int $Invoice_Id
 * @property int $Product_Id
 * @property string $Quantity
 * @property string $Discount
 * @property string $Total
 *
 * @property Invoice $invoice
 */
class InvoiceHasProduct extends \yii\db\ActiveRecord
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
            [['Invoice_Id', 'Product_Id', 'Discount', 'Total'], 'required'],
            [['Invoice_Id', 'Product_Id'], 'integer'],
            [['Discount', 'Total', 'Quantity'], 'number'],
            [['Invoice_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['Invoice_Id' => 'Id']],
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
            'Discount' => 'Discount',
            'Total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['Id' => 'Invoice_Id']);
    }
}
