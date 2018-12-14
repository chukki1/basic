<?php

namespace app\models;

use Yii;
use \mdm\behaviors\ar\RelationTrait;
/**
 * This is the model class for table "po_item".
 *
 * @property int $id
 * @property string $po_item_no
 * @property double $quantity
 * @property int $po_id
 *
 * @property Po $po
 */
class PoItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'po_item';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'po_item_no', 'quantity'], 'required'],
            [['id', 'po_id'], 'integer'],
            [['quantity'], 'number'],
            [['po_item_no'], 'string', 'max' => 100],
            [['id'], 'unique'],
           [['po_id'], 'exist', 'skipOnError' => true, 'targetClass' => Po::className(), 'targetAttribute' => ['po_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'po_item_no' => 'Po Item No',
            'quantity' => 'Quantity',
            'po_id' => 'Po ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPo()
    {
        return $this->hasOne(Po::className(), ['id' => 'po_id']);
    }
}
