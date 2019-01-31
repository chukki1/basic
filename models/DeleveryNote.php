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
}
