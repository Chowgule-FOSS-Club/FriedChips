<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductQuestion */

$this->title = 'Product Question';
$this->params['breadcrumbs'][] = ['label' => 'Product Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pid' => $model->pid, 'qid' => $model->qid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pid' => $model->pid, 'qid' => $model->qid], [
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
            'p.name',
            'q.name',
            'status',
        ],
    ]) ?>

</div>
