<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Email
 * @property string $Password
 * @property string $NIC
 * @property string $Reemed_points
 * @property string $Earned-point
 * @property string $Point_balance
 * @property string $Mobile_No
 * @property int $User_type_Id
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Password', 'NIC', 'Reemed_points', 'Mobile_No', 'User_type_Id'], 'required'],
            [['User_type_Id'], 'integer'],
            [['Name', 'Email', 'Password', 'NIC', 'Reemed_points', 'Earned-point', 'Point_balance', 'Mobile_No'], 'string', 'max' => 45],
            [['Password'], 'unique'],
            [['NIC'], 'unique'],
            [['Mobile_No'], 'unique'],
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
            'NIC' => 'Nic',
            'Reemed_points' => 'Reemed Points',
            'Earned-point' => 'Earned Point',
            'Point_balance' => 'Point Balance',
            'Mobile_No' => 'Mobile  No',
            'User_type_Id' => 'User Type  ID',
        ];
    }
}
