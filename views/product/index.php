<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
     <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
             [
            'format' => 'html',      
            'attribute' => 'image',    
            'value' => function ($model) {
             return Html::a(Html::img($model->image,['class'=>'col-md-10']),'index.php?r=product%2Fupdate-image&id='.$model->pid);
            },
            'options' => ['class' => 'col-md-3'],
            ],
            'status',
            'rank',            
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
