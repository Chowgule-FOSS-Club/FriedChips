<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductQuestion */

$this->title = 'Create Product Question';
$this->params['breadcrumbs'][] = ['label' => 'Product Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
