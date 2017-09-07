<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthAssignment */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-view">

   

    <p>
        
    </p>

    <?php 
        $user = Users::findOne($model->user_id);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Role Name',
                'value' => $model->item_name,
            ],
            [
                'label' => 'Username',
                'value' => $user->email,
            ],
            [
                'label' => 'Name',
                'value' => $user->name,
            ],
        ],
    ]) ?>

</div>
