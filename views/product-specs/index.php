<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modelsProductSpecsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Specs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Specs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'sid',
                'value'=>'s.name'
            ],
            [
                'attribute'=>'pid',
                'value'=>'p.name'
            ],
            'value',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
