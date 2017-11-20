<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductQuestion */

$this->title = 'Update Product Question';
$this->params['breadcrumbs'][] = ['label' => 'Product Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pid, 'url' => ['view', 'pid' => $model->pid, 'qid' => $model->qid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
