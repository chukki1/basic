<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $Name
 * @property string $Email
 * @property string $NIC
 * @property int $PhoneNO
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Name', 'Email', 'NIC', 'PhoneNO'], 'required'],
            [['id', 'PhoneNO'], 'integer'],
            [['Name', 'Email', 'NIC'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'NIC' => 'Nic',
            'PhoneNO' => 'Phone No',
        ];
    }
}
