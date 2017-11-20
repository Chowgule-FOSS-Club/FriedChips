<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_ans_questions".
 *
 * @property string $created_time
 * @property integer $pid
 * @property integer $qid
 * @property integer $uid
 * @property string $answer
 * @property string $isRead
 *
 * @property Product $p
 * @property Questions $q
 * @property Users $u
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
            [['created_time', 'pid', 'qid', 'uid'], 'required'],
            [['created_time'], 'safe'],
            [['pid', 'qid', 'uid'], 'integer'],
            [['answer', 'isRead'], 'string'],
            [['pid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pid' => 'pid']],
            [['qid'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['qid' => 'qid']],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['uid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_time' => 'Created Time',
            'pid' => 'Pid',
            'qid' => 'Qid',
            'uid' => 'Uid',
            'answer' => 'Answer',
            'isRead' => 'Is Read',
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
    public function getU()
    {
        return $this->hasOne(Users::className(), ['userid' => 'uid']);
    }
}
