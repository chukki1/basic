<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipment".
 *
 * @property int $Id
 * @property string $Discription
 * @property string $Suplier
 * @property int $Administrator_Id
 * @property string $Date
 * @property string $Time
 * @property string $Item_Id
 * @property int $Quantity
 */
class Shipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Discription'], 'string'],
            [['Administrator_Id', 'Date', 'Time', 'Item_Id', 'Quantity'], 'required'],
            [['Administrator_Id', 'Quantity'], 'integer'],
            [['Date', 'Time'], 'safe'],
            [['Suplier'], 'string', 'max' => 45],
            [['Item_Id'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Discription' => 'Discription',
            'Suplier' => 'Suplier',
            'Administrator_Id' => 'Administrator  ID',
            'Date' => 'Date',
            'Time' => 'Time',
            'Item_Id' => 'Item  ID',
            'Quantity' => 'Quantity',
        ];
    }
}
