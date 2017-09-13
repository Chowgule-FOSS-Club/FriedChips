<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\HomeAsset;
use yii\helpers\Url;

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Khula' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Cambay' rel='stylesheet'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
        <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Salgaocar Home Page</title>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>


  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#myPage">SALGAOCAR ENGINEERS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="?r=product/view-products"><span class="glyphicon glyphicon-shopping-cart"></span> PRODUCTS</a></li>
          <li><a href="#about"><span class="glyphicon glyphicon-align-justify"></span> ABOUT</a></li>
          <li><a href="#services"><span class="glyphicon glyphicon-briefcase"></span> SERVICES</a></li>
          <li><a href="#clients"><span class="glyphicon glyphicon-list-alt"></span> CLIENTS</a></li>
          <li><a href="#contact"><span class="glyphicon glyphicon-phone-alt"></span> CONTACT</a></li>
          
          <?php 
            if(Yii::$app->user->isGuest){
                echo "<li><a href=\"index.php?r=site/login\"><span class='glyphicon glyphicon-pencil'> </span> LOGIN</a></li>";
            }
            else{
                ?>
                <li>
                    <?=HTML::a(
                        "<span class=\"glyphicon glyphicon-user\"></span> ".strtoupper(Yii::$app->user->identity->name),
                        ['product/index']
                    ); ?>
                </li>
                 <li><?= HTML::a(
                    "<span class='glyphicon glyphicon-off'></span>",
                    ['site/logout'],
                    ['data-method' => 'POST']
                );?></li>
                
                <?php
            }
            /* <li><a data-method='POST' href=\"index.php?r=site/logout\">(". Yii::$app->user->identity->getName() .") LOGOUT</a></li> */
          ?>
        
        </ul>
      </div>
    </div>
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
