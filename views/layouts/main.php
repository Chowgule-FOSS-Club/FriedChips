


<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

 use yii\helpers\Html;
 use yii\helpers\Json;
 use app\models\Questions;
 use yii\db\Query;
 date_default_timezone_set('Asia/Calcutta');

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Khula' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cambay' rel='stylesheet'>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <?php 
                            if(!Yii::$app->user->isGuest){
                                echo HTML::img(
                                    Yii::$app->user->identity->image,
                                    [
                                        
                                        'class' => 'img-circle profile_img'
                                    ]
                                );
                            }
                        ?>
                        <!--<img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img"> -->
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>
                        <?php
                            if(!Yii::$app->user->isGuest){
                                echo Yii::$app->user->identity->getName() ; 
                            }
                        ?>
                        </h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>General</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home",  "url" => ["site/index"], "icon" => "home"],

                                    //["label" => "Layout", "url" => ["site/layout"], "icon" => "files-o"],
                                    //["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                    [
                                        "label" => "Products",
                                        "icon" => "briefcase",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Product", "url" => ["product/index"]],
                                            ["label" => "Specification", "url" => ["specification/index"]],
                                            ["label" => "Product Specs", "url" => ["product-specs/index"]],
                                            ["label" => "Questions", "url" => ["questions/index"]],
                                            ["label" => "Product Questions", "url" => ["product-question/index"]],
                                            ["label" => "Category", "url" => ["category/index"]],
                                            ["label" => "Product Category", "url" => ["product-category/index"]],
                                            ["label" => "User Answers Questions", "url" => ["user-ans-questions/index"]]
                                        ],
                                    ],
                                    [
                                        "label" => "Profiles",
                                        "icon" => "user",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Create Profile", "url" => ["users/create"]],
                                            ["label" => "User Profiles", "url" => ["users/index"]]
                                        ]
                                    ],
                                    [
                                        "label" => "Access Control",
                                        "icon" => "lock",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Permission", "url" => ["auth/index"]],
                                            ["label" => "Roles", "url" => ["role/index"]],
                                            ["label" => "User Roles", "url" => ["auth-assignment/index"]],
                                            ["label" => "Rule", "url" => ["rule/index"]],
                                            ["label" => "Permission and rules", "url" => ["rule-permission/index"]]
                                        ]
                                    ],
                                    /*[
                                        "label" => "Badges",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Default",
                                                "url" => "#",
                                                "badge" => "123",
                                            ],
                                            [
                                                "label" => "Success",
                                                "url" => "#",
                                                "badge" => "new",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Danger",
                                                "url" => "#",
                                                "badge" => "!",
                                                "badgeOptions" => ["class" => "label-danger"],
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Multilevel",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Second level 1",
                                                "url" => "#",
                                            ],
                                            [
                                                "label" => "Second level 2",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Third level 1",
                                                        "url" => "#",
                                                    ],
                                                    [
                                                        "label" => "Third level 2",
                                                        "url" => "#",
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ], */
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a> 
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               
                                <?php 
                                    if(!Yii::$app->user->isGuest){
                                        echo HTML::img(
                                            Yii::$app->user->identity->image
                                        );
                                        echo Yii::$app->user->identity->getName() ; 
                                        
                                    }
                                ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <?php 
                                        if(!Yii::$app->user->isGuest){
                                            echo HTML::a(
                                                'Profile',
                                                ['users/view', 'id' => Yii::$app->user->identity->userid]
                                            ) ; 
                                        }
                                    ?>
                                
                                </li>
                                <li>
                                    <?php 
                                        if(!Yii::$app->user->isGuest){
                                            echo HTML::a(
                                                'Change Password',
                                                ['users/change-password', 'id' => Yii::$app->user->identity->userid]
                                            ) ; 
                                        }
                                    ?>
                                
                                </li>
                                <li>
                                    <?php 
                                        if(!Yii::$app->user->isGuest){
                                            echo HTML::a(
                                                'Change Profile',
                                                ['users/update-dp', 'id' => Yii::$app->user->identity->userid]
                                            ) ; 
                                        }
                                    ?>
                                
                                </li>
                                <!--
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                -->
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li>
                                    <?=
                                        HTML::a(
                                            "<i class=\"fa fa-sign-out pull-right\"></i> Log Out",
                                            ['site/logout'],
                                            [
                                                'data-method' => 'POST',
                                            ]

                                        );
                                    ?>          
                                </li>
                            </ul>
                        </li>
                        <? 
$count= Questions::find()
->innerjoinWith('userAnsQuestions')
->where('isRead!=true')
->orderBy('date_created')
->count();
$query= new Query();
$query->select(['product.name As pname','product.description As description','product.pid As product','users.fname As fname','users.userid As user','users.lname As lname','user_ans_questions.created_time as date'])
        ->from('user_ans_questions' )
        ->join('INNER JOIN', 'questions','user_ans_questions.qid =questions.qid')
        ->join('INNER JOIN','product','user_ans_questions.pid =product.pid')
        ->join('INNER JOIN','users','user_ans_questions.uid =users.userid')
        ->where('isRead!=true')
        ->orderBy('user_ans_questions.created_time')
        ->groupBy(['user_ans_questions.uid','user_ans_questions.pid'])
        ->LIMIT(4);
        $command=$query->createCommand();
        //echo $command->getRawSql();
        $data=$command->queryAll();
        $result=array_values($data);
        $json=JSON::encode($result);
        
        $djson=JSON::decode($json);
?>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"><?=$count;?></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">


                            <?php  foreach($djson as $details){
                                        
                                
                                ?>
                                        
                                <li>
                                    <div>
                                    <a>
                                        <span><?=$details['fname']." ".$details['lname'];?></span>
                                        <span>                
                      <span class="time"><?php 
                       $date1 = new DateTime($details['date']);
                       $date = date('m/d/Y h:i:s a', time());
                       $date2=new DateTime($date);
                       $diff=$date2->diff($date1);
                       $hours=$diff->format('%h');
                       $mins= $diff->format('%i');
                       $secs=$diff->format('%s');
                       $hours = $hours + ($diff->days*24);
                       if($hours===0){
                            if($mins===0) echo $secs." seconds ago ";
                            else if($mins===1) echo $mins." minute ago ";
                            else if($mins>1) echo $mins." mins ago ";
                                     }
                      
                           else      if($hours===1){
                        if($mins===0) echo $hours." hour ago ";
                        else if($mins===1) echo $hours." hour and ".$mins." min ago ";
                        else if($mins>1) echo $hours." hour and ".$mins." mins ago ";
                                        }
                       else if($hours>1){
                        if($mins===0) echo $hours." hours ago ";
                        else if($mins===1) echo $hours." hours and ".$mins." min ago ";
                        else if($mins>1) echo $hours." hours and ".$mins." mins ago ";
                                         }
                                        
                    else  echo"few secs ago";           
                      
                      
                      ?></span> 
                      </span>
                      <span class="message">
                      <?= $details['pname'];?>
                                    </span>
                                    </a>

                                    </div>
                                </li>
                            
                            
                                                      
                               
                                
                                        <?php }
                                        if($count!=0){
                                        ?>

                                <li>
                                    <div class="text-center">
                                    <?php 
                                        if(!Yii::$app->user->isGuest){
                                            echo HTML::a(
                                                'See All Issues',
                                                ['user-ans-questions/', 'id' => Yii::$app->user->identity->userid]
                                            ) ; 
                                        }
                                    ?>
                                
                                        
                                    </div>
                                </li>
                                    <?} ?>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
                Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
