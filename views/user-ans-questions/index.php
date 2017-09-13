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
        
      
        ?>
    </p>


    <div class="wrapper">
        <div class="cards">
                <?
                $query = new Query();
                $query->select('uid')
                        ->from('user_ans_questions')
                        ->all();


                        $command=$query->createCommand();
                        echo $command->getRawSql();
                        $data=$command->queryAll();
                        foreach($data as $d) echo $d->uid;
                
                ?>
            <div class=" card [ is-collapsed ] ">
                <div class="card__inner [ js-expander ]">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <h3>Product: <small>Bull-dozers</small></h3>
                            </div>
                            <div class="col-md-4">
                                <h3>User Name: <small>Bull-dozers</small></h3>
                            </div>
                            <div class="col-md-4">
                                <h3> <small>dd/mm/yyyy</small></h3>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="card__expander">
                    <div class="row  text-center">
                        <div class="col-sm-6 row1">
                            <div class="row ">
                                <div class="col-xs-12">UserName</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">Product Name</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">rishikam97@gmail.com</div>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <h2>Questions and Answers</h2>
                            <div class="ques">Q1 What is his top speed ? </div>
                            <div class="ans"> 90</div>
                            <div class="ques">Q2 What is his shot speed ? </div>
                            <div class="ans"> 150</div>
                            <div class="ques">Q3 Is he fit to play 90mins?</div>
                            <div class="ans">34</div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    </div>
</div>
