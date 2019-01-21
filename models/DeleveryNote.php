<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delevery_note".
 *
 * @property int $Id
 * @property string $Created_date
 * @property string $Discription
 * @property string $Customer_Id
 * @property string $Status
 * @property int $Administrator_Id
 *
 * @property Administrator $administrator
 * @property Order[] $orders
 */
class DeleveryNote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delevery_note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Created_date', 'Customer_Id', 'Status', 'Administrator_Id'], 'required'],
            [['Created_date'], 'safe'],
            [['Discription'], 'string'],
            [['Administrator_Id'], 'integer'],
            [['Customer_Id', 'Status'], 'string', 'max' => 45],
            [['Administrator_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Administrator::className(), 'targetAttribute' => ['Administrator_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Created_date' => 'Created Date',
            'Discription' => 'Discription',
            'Customer_Id' => 'Customer  ID',
            'Status' => 'Status',
            'Administrator_Id' => 'Administrator  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrator::className(), ['Id' => 'Administrator_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Delevery_note_Id' => 'Id']);
    }
}
