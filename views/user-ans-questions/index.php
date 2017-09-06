<?php



use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use app\models\UserAnsQuestions;

$model= UserAnsQuestions::find()
->where('isRead!=false')->all();
foreach($model as $m){
$m->isRead=true;
$m->update(false); }

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserAnsQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Ans Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-ans-questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'uid',
                'value'=>'user.email'
            ],
            [
                'attribute'=>'pid',
                'value'=>'p.name'
            ],
            [
                'attribute'=>'qid',
                'value'=>'q.name'
            ],
           
            'answer:ntext',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    
    
    
    
    
    
    ?>
</div>
