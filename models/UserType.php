<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property int $Id
 * @property string $Name
 *
 * @property Administrator[] $administrators
 * @property Cashier[] $cashiers
 * @property Customer[] $customers
 * @property RoleHasUserType[] $roleHasUserTypes
 * @property Role[] $roles
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Name'], 'required'],
            [['Id'], 'integer'],
            [['Name'], 'string', 'max' => 45],
            [['Id'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrators()
    {
        return $this->hasMany(Administrator::className(), ['User_type_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashiers()
    {
        return $this->hasMany(Cashier::className(), ['User_type_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['User_type_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleHasUserTypes()
    {
        return $this->hasMany(RoleHasUserType::className(), ['User_type_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Role::className(), ['Id' => 'Role_Id'])->viaTable('role_has_user_type', ['User_type_Id' => 'Id']);
    }
}
