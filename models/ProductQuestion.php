<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_question".
 *
 * @property integer $pid
 * @property integer $qid
 * @property string $status
 *
 * @property Product $p
 * @property Questions $q
 */
class ProductQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'qid', 'status'], 'required'],
            [['pid', 'qid'], 'integer'],
            [['status'], 'string'],
            [['pid', 'qid'], 'unique', 'targetAttribute' => ['pid', 'qid']],
            [['pid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pid' => 'pid']],
            [['qid'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['qid' => 'qid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Product',
            'qid' => 'Question',
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
    public function getQ()
    {
        return $this->hasOne(Questions::className(), ['qid' => 'qid']);
    }
}
