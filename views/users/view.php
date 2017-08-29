<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = " ".$model->fname ."  " .$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1> <?php 
        if($model->image != null){
            echo "<img src='".$model->image."' height=150 class='img img-circle'/>";
        }
    ?><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
            if(!Yii::$app->user->isGuest){
                if(!Yii::$app->user->identity->userid === $model->userid){
                    echo Html::a('Delete', ['delete', 'id' => $model->userid], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                }
            }
        ?>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userid',
            'fname',
            'lname',
            'email:email',
            'authKey',
        ],
    ]) ?>

</div>
