<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_category".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Description
 * @property string $Status
 *
 * @property Subcatagory[] $subcatagories
 */
class MainCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Description', 'Status'], 'required'],
            [['Description'], 'string'],
            [['Name', 'Status'], 'string', 'max' => 45],
            [['Name'], 'unique'],
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
            'Description' => 'Description',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcatagories()
    {
        return $this->hasMany(Subcatagory::className(), ['main_category_Id' => 'Id']);
    }
}
