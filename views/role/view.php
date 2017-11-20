<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthItem */

$this->title = $model->name.' Permission';
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php 
        $permission_string = "";
        $authManager = Yii::$app->authManager;
        $permissions = $authManager->getPermissionsByRole($model->name);
        foreach($permissions as $permission){
            $permission_string = $permission_string . " ".$permission->name;
        }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'name',
            [
                'label' => "Permissions",
                'value' => $permission_string,
            ],
            'description:ntext',
        ],
    ]) ?>

</div>
