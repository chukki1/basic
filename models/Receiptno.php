<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receiptno".
 *
 * @property int $id
 * @property int $receipt_no
 * @property string $date
 *
 * @property Receipt[] $receipts
 */
class Receiptno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receiptno';
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receipt_no', 'date'], 'required'],
            [['receipt_no'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receipt_no' => 'Receipt No',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['receiptNo_id' => 'id']);
    }
}
