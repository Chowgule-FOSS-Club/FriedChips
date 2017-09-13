<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\UserAnsQuestionsAsset;
use yii\db\Query;



/* @var $this yii\web\View */
/* @var $searchModel app\models\UserAnsQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
UserAnsQuestionsAsset::register($this);
$this->title = 'User Ans Questions';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="user-ans-questions-index" >

    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Ans Questions', ['view'], ['class' => 'btn btn-success']) ;
        $query = new Query();
        $query->select(['product.name As pname','users.userid As uid','product.pid As product','users.email As email','users.fname As fname','users.lname As lname','user_ans_questions.created_time as date'])
        ->from('user_ans_questions' )
        ->join('INNER JOIN', 'questions','user_ans_questions.qid =questions.qid')
        ->join('INNER JOIN','product','user_ans_questions.pid =product.pid')
        ->join('INNER JOIN','users','user_ans_questions.uid =users.userid')
        ->where('isRead!=true')
        ->orderBy('user_ans_questions.created_time')
        ->groupBy('user_ans_questions.created_time');

                $command=$query->createCommand();
                //echo $command->getRawSql();
                $data=$command->queryAll();
                $result=array_values($data);

        
        



      
        ?>
    </p>


    <div class="wrapper">
    <?
                        foreach($result as $r){

                            $d= new DateTime($r['date']);
                            $date=$d->format('d/m/Y');
                           //$time = date("Y/m/d h:i:s",$d->format('y-m-d H:i:s'));
                            $p= $r['product'];

                            $query1= new Query();
                            $query1->select(['questions.name As qname','user_ans_questions.answer As answer','user_ans_questions.created_time As time'])
                            ->from('user_ans_questions' )
                            ->join('INNER JOIN', 'questions','user_ans_questions.qid =questions.qid')
                            
                            ->where('isRead!=true')
                           ->andwhere('pid='.$p)
                            ->andwhere('uid='.$r['uid']);
                            

                            $command1=$query1->createCommand();
                            //echo $command1->getRawSql();
                            $data1=$command1->queryAll();
                            $questions=array_values($data1);

                           
                            

                ?>
        <div class="cards">
                
            <div class=" card [ is-collapsed ] ">
                <div class="card__inner [ js-expander ]">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <h3>Product: <small><?= $r['pname'];?></small></h3>
                            </div>
                            <div class="col-md-4">
                                <h3>User Name: <small><?= $r['fname']." ".$r['lname'];?></small></h3>
                            </div>
                            <div class="col-md-4">
                                <h3> <small><?= $date;?></small></h3>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="card__expander">
                    <div class="row  text-center">
                        <div class="col-sm-6 row1">
                            <div class="row ">
                                <div class="col-xs-12"><?= $r['fname']." ".$r['lname'];?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><?= $r['pname'];?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><?= $r['email'];?></div>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <h2>Questions and Answers</h2>
                            <?  
                            
                                foreach($questions as $q){
                                if($q['time']===$r['date']) {
                           ?>
                            <div class="ques"><?= "Q:".$q['qname']?></div>
                            <div class="ans"><?= "A:".$q['answer']?></div><br>
                            <?}}?>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <?}?>
    </div>

    </div>
</div>
