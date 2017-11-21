<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $pid
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $status
 * @property string $rank
 *
 * @property ProductCategory[] $productCategories
 * @property Category[] $cs
 * @property ProductQuestion[] $productQuestions
 * @property Questions[] $qs
 * @property ProductSpecs[] $productSpecs
 * @property Specification[] $s
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status','image','rank'], 'required'],
            [['description', 'status'], 'string'],
            ['file','file'],
            ['name', 'unique',],
            [['name'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'name' => 'Product',
            'description' => 'Description',
            'image' => 'Image',
            'status' => 'Status',
            'file' => 'Upload Image'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCs()
    {
        return $this->hasMany(Category::className(), ['cid' => 'cid'])->viaTable('product_category', ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductQuestions()
    {
        return $this->hasMany(ProductQuestion::className(), ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQs()
    {
        return $this->hasMany(Questions::className(), ['qid' => 'qid'])->viaTable('product_question', ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSpecs()
    {
        return $this->hasMany(ProductSpecs::className(), ['pid' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasMany(Specification::className(), ['sid' => 'sid'])->viaTable('product_specs', ['pid' => 'pid']);
    }
}
