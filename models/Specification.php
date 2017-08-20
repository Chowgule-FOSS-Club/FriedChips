<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specification".
 *
 * @property integer $sid
 * @property string $name
 *
 * @property ProductSpecs[] $productSpecs
 * @property Product[] $ps
 */
class Specification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Sid',
            'name' => 'Specification',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSpecs()
    {
        return $this->hasMany(ProductSpecs::className(), ['sid' => 'sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPs()
    {
        return $this->hasMany(Product::className(), ['pid' => 'pid'])->viaTable('product_specs', ['sid' => 'sid']);
    }
}
