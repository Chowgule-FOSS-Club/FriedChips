<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $userid
 * @property string $fname
 * @property string $lname
 * @property string $password
 * @property string $email
 * @property string $authKey
 *
 * @property CustomerQuestions[] $customerQuestions
 * @property Questions[] $qs
 * @property UserAdmin $userAdmin
 * @property UserCustomer $userCustomer
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'password', 'email'], 'required'],
            [['fname', 'lname'], 'string', 'max' => 25],
            [['email', 'authKey'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'password' => 'Password',
            'email' => 'Email',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerQuestions()
    {
        return $this->hasMany(CustomerQuestions::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQs()
    {
        return $this->hasMany(Questions::className(), ['qid' => 'qid'])->viaTable('customer_questions', ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAdmin()
    {
        return $this->hasOne(UserAdmin::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCustomer()
    {
        return $this->hasOne(UserCustomer::className(), ['userid' => 'userid']);
    }

        public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->userid;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getName(){
        return $this->fname . ' ' . $this->lname;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['email' => $username]);
    }

}
