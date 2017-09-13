<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserAnsQuestions */

$this->title = $model->created_time;
$this->params['breadcrumbs'][] = ['label' => 'User Ans Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-ans-questions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'created_time' => $model->created_time, 'pid' => $model->pid, 'qid' => $model->qid, 'uid' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'created_time' => $model->created_time, 'pid' => $model->pid, 'qid' => $model->qid, 'uid' => $model->uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'created_time',
            'pid',
            'qid',
            'uid',
            'answer:ntext',
            'isRead',
        ],
    ]) ?>

</div>
