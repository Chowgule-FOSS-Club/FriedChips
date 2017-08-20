<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecs */

$this->title = 'Create Product Specs';
$this->params['breadcrumbs'][] = ['label' => 'Product Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
