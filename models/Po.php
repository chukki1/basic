<?php

namespace app\models;

use Yii;
use mdmsoft\behaviors\ar\RelationTrait;
/**
 * This is the model class for table "po".
 *
 * @property int $id
 * @property string $po_no
 * @property string $description
 *
 * @property PoItem[] $poItems
 */
class Po extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'po';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['po_no', 'description'], 'required'],
            [['description'], 'string'],
            [['po_no'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'po_no' => 'Po No',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoItem()
    {
        return $this->hasMany(PoItem::className(), ['po_id' => 'id']);
    }
    public function setPoItem($value)
    {
        $this->loadRelated('PoItems', $value);
    }
}
