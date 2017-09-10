<?php 
namespace app\models\rules;

use yii\rbac\Rule;
use app\models\Users;

/**
 * Checks if authorID matches user passed via params
 */
class DisplayLoggedUser extends Rule
{
    public $name = 'isUser';

    public function execute($user, $item, $params)
    { 
        return isset($params['users']) ? $params['users']->userid == $user : false;
    }
} 

?> 