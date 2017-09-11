
<?php



use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use app\models\UserAnsQuestions;
use app\models\Questions;
use app\assets\UserAnsQuestionsAsset;
use yii\helpers\Json;


UserAnsQuestionsAsset::register($this);

// $model= UserAnsQuestions::find()
// ->where('isRead!=false')->all();
// foreach($model as $m){
// $m->isRead=true;
// $m->update(false); }

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserAnsQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Ans Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<body>
<div class="user-ans-questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?


$productslist= new Query();
$productslist->select(['product.name As pname','product.pid As pid','product.image As pimg','users.fname As fname','users.lname As lname',
                    'users.image As uimg'])
        ->from('user_ans_questions' )
        ->join('INNER JOIN','product','user_ans_questions.pid =product.pid')
        ->join('INNER JOIN','users','user_ans_questions.uid =users.userid')
        ->where('isRead!=true')
        ->orderBy('user_ans_questions.created_time')
->groupBy('user_ans_questions.pid');
        $command=$productslist->createCommand();
       //$command->getRawSql();
        $data=$command->queryAll();
        $result=array_values($data);
        $json=JSON::encode($result);
        $djson=JSON::decode($json);



?>
    
    <div class="wrapper">

    <? foreach($djson as $details){ 
        $details['pname'];
        $pid=$details['pid'];

        $questionslist= new Query();
        $questionslist->select(['questions.name As questions','user_ans_questions.answer As answer'])
        ->from('user_ans_questions')
        ->join('INNER JOIN','questions','user_ans_questions.qid =questions.qid')
        ->where('pid='.$pid)
        ->andWhere('isRead!=true');

        $command1=$questionslist->createCommand();
        $command1->getRawSql();
        $data1=$command1->queryAll();
        $result1=array_values($data1);
        $json1=JSON::encode($result1);
        $djson1=JSON::decode($json1);
            
        
    ?>

        <div class="cards" id=<?= $details['pid']?>>

            <div class=" card [ is-collapsed ] ">
                <div class="card__inner [ js-expander ]">
                    <div class="container-fluid">
                        <img class="img-thumbnail" id="pimg" src="<?= $details['pimg'] ?>" >
                        <h3>Product: <small><?= $details['pname'];?></small></h3>
                        <div class="inline2">
                            <img class="img-thumbnail" id="uimg" src=<?= $details['uimg'];?> >
                            <h3>User Name: <small><?= $details['fname']." ".$details['lname']; ?></small></h3>
                        </div>
                    </div>

                </div>
                <div class="card__expander">
                    <div class="ques-ans">
                    <h2>Questions and Answers</h2>
                       <? foreach($djson1 as $details1){ ?>
                        
                        <div align="left"><?= $details1['questions']." : ".$details1['answer'];?></div>
                        <? } ?>
                       
                    </div>
                </div>
            </div>

           
        </div>
        <? } ?>

    </div>



</div>
</body>
</html>
