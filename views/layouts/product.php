<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ProductAsset;
use yii\helpers\Url;

ProductAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

   
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Salgaocar Home Page</title>
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <link href='https://fonts.googleapis.com/css?family=Khula' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cambay' rel='stylesheet'>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="index.php">SALGAOCAR ENGENEERING</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
           <ul class="nav navbar-nav navbar-right">
            <?php
            if (Yii::$app->user->isGuest) {
                echo "<li><a href=\"index.php?r=site/login\">LOGIN</a></li>";
            }else{
                ?>
                <li>
                    <?=HTML::a(
                        Yii::$app->user->identity->name,
                        ['product/index']
                    ); ?>
                </li>
                <li><?= HTML::a(
                    "LOGOUT",
                    ['site/logout'],
                    ['data-method' => 'POST']
                );?></li>
                
                <?php
            }
            ?>

            </ul>
                <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" />
                        </div>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </form>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
<?= $content?>


<footer class="text-center ">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p class="addr"><span></span>1110, New Delhi House, 27, Barakhamba Road, New Delhi - 110 001</p>
       
        <p><span ></span> sepldel@gmail.com</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Find us on</h3>
                            
                    <ul class="social-network social-circle">
                       
                        <li><a href="#" class="icoFacebook icon" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter icon" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle icon" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin icon" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>               
                
                    </div>
                    <div class="col-md-4">
                        <h3>Contact numbers</h3>
                          +91-11-23315929<br>
                          +91-11-23312693
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; salgaocarEngineers.com 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
