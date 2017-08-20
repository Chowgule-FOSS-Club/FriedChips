<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecs */

$this->title = 'Update Product Specs: ' . $model->sid;
$this->params['breadcrumbs'][] = ['label' => 'Product Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sid, 'url' => ['view', 'sid' => $model->sid, 'pid' => $model->pid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-specs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
