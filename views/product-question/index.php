<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Question', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'pid',
                'value'=>'p.name'
            ],
            [
                'attribute'=>'qid',
                'value'=>'q.name'
            ],
            'value',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
