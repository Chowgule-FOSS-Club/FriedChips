<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_ans_questions".
 *
 * @property integer $uid
 * @property integer $qid
 * @property integer $pid
 * @property string $answer
 *
 * @property Product $p
 * @property Questions $q
 * @property Users $user
 */
class UserAnsQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_ans_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'qid', 'pid', 'answer'], 'required'],
            [['uid', 'qid', 'pid'], 'integer'],
            [['answer'], 'string'],
            [['pid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pid' => 'pid']],
            [['qid'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['qid' => 'qid']],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'User',
            'qid' => 'Question',
            'pid' => 'Product',
            'answer' => 'Answer',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userid' => 'uid']);
    }
}
