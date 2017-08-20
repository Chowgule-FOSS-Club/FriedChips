<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecs */

$this->title = 'Product Specification';
$this->params['breadcrumbs'][] = ['label' => 'Product Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sid' => $model->sid, 'pid' => $model->pid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sid' => $model->sid, 'pid' => $model->pid], [
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
            's.name',
            'value',
            'status',
        ],
    ]) ?>

</div>
