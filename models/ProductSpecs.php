<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_specs".
 *
 * @property integer $sid
 * @property integer $pid
 * @property string $value
 * @property string $status
 *
 * @property Product $p
 * @property Specification $s
 */
class ProductSpecs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_specs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'pid', 'value','status'], 'required'],
            [['sid', 'pid'], 'integer'],
            [['status'], 'string'],
            [['value'], 'string', 'max' => 500],
            [['pid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pid' => 'pid']],
            [['sid'], 'exist', 'skipOnError' => true, 'targetClass' => Specification::className(), 'targetAttribute' => ['sid' => 'sid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Specification',
            'pid' => 'Product',
            'value' => 'Value',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Product::className(), ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Specification::className(), ['sid' => 'sid']);
    }
}
