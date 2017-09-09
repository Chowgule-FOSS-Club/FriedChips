<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Permission';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Permission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'description:ntext',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'leadView' => function ($url, $model) {
                        $url = Url::to(['controller/lead-view', 'id' => $model->whatever_id]);
                       return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                    },
                    'leadUpdate' => function ($url, $model) {
                        $url = Url::to(['controller/lead-update', 'id' => $model->whatever_id]);
                        return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                    },
                 ]
            
            ],
        ],
    ]); ?>
</div>
