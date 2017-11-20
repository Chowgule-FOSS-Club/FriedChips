<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_customer".
 *
 * @property integer $userid
 * @property string $company
 * @property string $phone
 *
 * @property Users $user
 */
class UserCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'phone'], 'required'],
            [['userid'], 'integer'],
            [['company'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 10],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'company' => 'Company',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userid' => 'userid']);
    }
}
