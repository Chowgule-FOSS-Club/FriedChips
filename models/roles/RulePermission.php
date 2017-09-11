<?php

namespace app\models\roles;

use Yii;
use yii\base\Model;

class RulePermission extends Model
{
    public $ruleName;
    public $permission;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
           [['ruleName', 'permission'], 'required']
        ];
    }

}
