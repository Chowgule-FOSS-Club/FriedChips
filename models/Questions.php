<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property integer $qid
 * @property string $name
 *
 * @property CustomerQuestions[] $customerQuestions
 * @property Users[] $users
 * @property ProductQuestion[] $productQuestions
 * @property Product[] $ps
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'],'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qid' => 'Qid',
            'name' => 'Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerQuestions()
    {
        return $this->hasMany(CustomerQuestions::className(), ['qid' => 'qid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['userid' => 'userid'])->viaTable('customer_questions', ['qid' => 'qid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductQuestions()
    {
        return $this->hasMany(ProductQuestion::className(), ['qid' => 'qid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPs()
    {
        return $this->hasMany(Product::className(), ['pid' => 'pid'])->viaTable('product_question', ['qid' => 'qid']);
    }

    public function getUserAnsQuestions()
    {
        return $this->hasMany(UserAnsQuestions::className(), ['qid' => 'qid']);
    }
}
