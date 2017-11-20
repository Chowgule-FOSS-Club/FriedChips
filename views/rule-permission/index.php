<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Permission and rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Add Rule to Permission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'ruleName',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php 
    $script = <<< JS
    $(document).ready(function(){
        $("a[aria-label='View']").css("display", "none");
        $("a[aria-label='Update']").css("display", "none");
    });
JS;
    $this->registerJS($script);
?>