<?php 
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use app\models\UserCustomer;
use app\models\Users;
?>
<div id="alert-div" align="center" style="display:none;">
</div>                                                      
 <!-- modal form -->
    <div class="modal fade "  id="modal-1" >
                           <div class="modal-dialog ">
                                <div class="modal-content">

                                    <div class="modal-body" style="height:400px">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>


                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li class="completed"><span>Contact Details</span></li>
                                                <li><span>Product Information</span></li>
                                                <li><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">

                                        <form class="contact-detail" name="contact-form">
                                            <div class=" form-line">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    
                                                    
                                                        <?php 
                                                            /*
                                                                getting the customer from the cutomer table based on the user logged in.
                                                                If customer not there in customer table, the customer variable will be empty.
                                                            */
                                                            $customer;
                                                            if(!Yii::$app->user->isGuest){
                                                                $customer = UserCustomer::findOne(['userid' => Yii::$app->user->identity->userid]);
                                                            }
                                                        ?>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                                                        <?php 
                                                            if(!empty($customer)){
                                                                echo "<input value='". Yii::$app->user->identity->getFname() ."' type=\"text\" name=\"InputFname\" placeholder=\"Enter Firstame\" class=\"form-control\" autofocus=\"autofocus\" required>";
                                                            
                                                            }else{
                                                                echo "<input type=\"text\" name=\"InputFname\" placeholder=\"Enter Firstname\" class=\"form-control\" autofocus=\"autofocus\" required>";    
                                                            }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                       
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                                                        <?php 
                                                            if(!empty($customer)){
                                                                echo "<input value='". Yii::$app->user->identity->getLname() ."' type=\"text\" name=\"InputLname\" placeholder=\"Enter Lastname\" class=\"form-control\" required>";
                                                            
                                                            }else{
                                                                echo "<input type=\"text\" name=\"InputLname\" placeholder=\"Enter Lastname\" class=\"form-control\" required>";    
                                                            }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope green"></i></span>
                                                        <?php 
                                                            if(!empty($customer)){
                                                                echo "<input value='".Yii::$app->user->identity->email."' type=\"email\" name=\"InputEmail\" placeholder=\"Enter Email\" class=\"form-control\" required>";
                                                            }else{
                                                                echo "<input type=\"email\" name=\"InputEmail\" placeholder=\"Enter Email\" class=\"form-control\" required>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone green"></i></span>
                                                        <?php 
                                                            if(!empty($customer)){
                                                                echo "<input value='".$customer->phone."' type=\"text\" name=\"InputCno\" placeholder=\"Phone : 9652145236\" class=\"form-control\" required>";
                                                            }else{
                                                                echo "<input type=\"text\" name=\"InputCno\" placeholder=\"Phone : 9652145236\" class=\"form-control\" required>";
                                                            }
                                                            ?>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div style="text-align:center">
                                                    <span name="validation-msg" ></span> 
                                                </div>
                                            </div>

                                        
                                            </div>  
                                                                      
                                     <button name="contact-form-btn" type="submit" class="btinqr btn-block text-center" data-dismiss="modal" data-target="#modal-2" data-toggle="modal">NEXT</button>
                                      </form>        
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-2">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li><span>Contact Details</span></li>
                                                <li class="completed"><span>Product Information</span></li>
                                                <li><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">
                                         <form class="product-info" id="prod-info" name="prod-question-form"> 
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-xs-5" id="prod-question">
                                                    </div>
                                                </div>
                                            </div>
                                         
                                    </div>

                                    </form>
                                    <button name="prod-question-btn" type="submit" class="btinqr btn-block text-center" data-dismiss="modal" data-target="#modal-3" data-toggle="modal">NEXT</button>
                                     
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-3">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li><span>Contact Details</span></li>
                                                <li><span>Product Information</span></li>
                                                <li class="completed"><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-xs-5" id="finalize-div">
                                                    </div>
                                                </div>
                                            </div>
                                         
                                    </div>
                                    
                                        <button name="finalize-btn" data-dismiss="modal" class="btinqr btn-block text-center" ><span >DONE</span></button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal form end -->
    <!-- Second navbar for search -->

    <!-- /.navbar -->
    <div class="rest-body container" >
        <div class="catalog">
            <nav class="navbar navbar-default navbar-static">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                    <h2>PRODUCT CATALOGS</h2>
                </div>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-large">
                            <a href="#" class=" btn  btn-outlined dropdown-toggle " data-toggle="dropdown">Search by Catagories <b class="caret"></b></a>

                            <ul class="dropdown-menu dropdown-menu-large row">
                            <?php foreach ($categorys as $category) : ?>
                                <li class="col-sm-4 cols">
                                    <ul>
                                        <li class="dropdown-header">  <?= $category->name?></li>
                                        <?php foreach ($category->ps as $products) : ?>
                                        <li><a href="index.php?r=product/view-specs&id=<?=$products->pid?>"><?= $products->name ?></a></li>
                                        <?php endforeach; ?>
                                        <li class="divider"></li>

                                    </ul>
                                </li>
                            <?php endforeach; ?>

                            </ul>

                        </li>
                    </ul>

                </div>
                <!-- /.nav-collapse -->
            </nav>



        </div>

        <div class="container">

            <?php foreach ($product as $products) : ?>
            <div id='<?= $products->pid ?>' class="col-xs-12 col-sm-4 zoom col-centered">
                    <div class="card">
                        <h4 class="card-title text-center">
                            <a class="product" href="#">
                            <?= $products->name ?>
                        </a>
                        </h4>
                        <a class="img-card" href="#">
                    <img class="img-responsive" src="<?= $products->image ?>"/>
                </a>
                        <br />
                        <div class="card-content">    
                            
                         
                            <div class=" text-center">
                                <a href="index.php?r=product/view-specs&id=<?=$products->pid?>" class="btn">
                                    <h4>View More info</h4>
                                </a>
                            </div>

                        </div>
                        <div class="btcnt" style="text-align:Center">
                            <?= Html::button($content = 'ENQUIRE', $options = ['value' => $products->pid , 'name' => 'enquire' , 'class' => 'btinqr btn-block' , 'data-target' => '#modal-1' , 'data-toggle' => 'modal' ]); ?>
                        </div>
                    </div>
                </div>


                <?php endforeach; ?>

            <div class="row">
               
            </div>
           
            <center> <h2>  <?= LinkPager::widget(['pagination' => $pagination]) ?> <h2> </center>
    </div>



    <!-- scroll top -->
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
    </div>
    </div>


<?php
   $script = <<< JS
    $('document').ready(function(){
        validate();
        $('[name="InputFname"] , [name="InputLname"], [name="InputEmail"] , [name="InputCno"]').bind('input propertychane' ,validate);
        var contactDetails;
        var data;
        var pid;
        $('[name="enquire"]').click(function(){
        $('#prod-question').html("");
        var id = $(this).val();
        pid = id;
        $.get('index.php?r=product/display-questions' , { id : id} , function(data){
            var raw = data;
            data = $.parseJSON(data);
            for(i=0 ; i<Object.keys(data).length ; i++){
                $('#prod-question').append(data[i].name + '<br/>' +
                    '<input type="text" name="' + data[i].qid + '" class="form-control" /> <br/><br/>' 
                );
            }
            $('#prod-question').append('<br/>' +
                    '<input type="hidden" name="all-questions"/> <br/><br/>');
            $('[name="all-questions"]').val(raw);
            })
        });

        $('[name="prod-question-btn"]').click(function(){
            var fname = $('[name="InputFname"]').val();
            var lname = $('[name="InputLname"]').val();        
            var email = $('[name="InputEmail"]').val();
            var cno = $('[name="InputCno"]').val();
            contactDetails = {
                "fname" : fname,
                "lname" : lname,
                "email" : email,
                "cno" : cno
                };
            data = $('[name="all-questions"]').val();
            data = $.parseJSON(data);
            $('#finalize-div').html(fname + '<br>' + lname + '<br>' + email + '<br>' + cno + '<br>');
            for(i=0 ; i<Object.keys(data).length ; i++){
                    var answer = $('[name="' + data[i].qid + '"]').val();
                    $('#finalize-div').append(data[i].name + ' : ' + answer + '<br/>');
                } 
        });

        $('[name="finalize-btn"]').click(function(){
            var answerJson = [];
            answerJson.push(contactDetails);
            for(i=0 ; i<Object.keys(data).length ; i++){
                    var answer = $('[name="' + data[i].qid + '"]').val();
                    answerJson.push({
                        pid : pid,
                        qid : data[i].qid,
                        answer : answer
                    });
                }           
            $.post("index.php?r=product/enquiry-form" ,
                    {
                        data : JSON.stringify(answerJson),
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        _csrf: yii.getCsrfToken(),
                    } , function(data){
                            window.scrollTo(0,0);
                            var alertdiv = $('#alert-div');
                            alertdiv.html(data);
                            alertdiv.css('display','block');
                            if(data == "Your data has been submitted" ) alertdiv.attr('class','alert alert-success');
                            else alertdiv.attr('class','alert alert-danger');
                            setTimeout(function() {
                                alertdiv.css('display','none');
                            }, 4000);
                            contactDetails = [];
                        })            
                });
});

function validate(){
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var nameRegex = /^[a-zA-Z]+$/;
    var cno = $('[name="InputCno"]').val();
    var email = $('[name="InputEmail"]').val();
    var fname = $('[name="InputFname"]').val();
    var lname = $('[name="InputLname"]').val();
    var emailcheck;
    $.post("index.php?r=product/validate-email" ,
                    {
                        data : email,
                        _csrf: yii.getCsrfToken(),
                    } , function(data){
                           emailcheck = data;
                           window.setTimeout(500);
                        })
                                
                    .done(function(){
                        if (fname.length   >   0   &&
                            lname.length  >   0   &&
                            email.length    >   0 &&
                            cno.length    ==   10  &&
                            numberRegex.test(cno) &&
                            nameRegex.test(fname) &&
                            nameRegex.test(lname) &&
                            emailcheck == 0 &&
                            emailRegex.test(email) ){
                            $('[name="validation-msg"]').html("You can now proceed!");
                            $('[name="validation-msg"]').css('color' , 'green');
                            $('[name="contact-form-btn"]').prop("disabled", false);
                        }
                        else {
                            $('[name="validation-msg"]').css('color' , 'red');                            
                            if(email!="" && !emailRegex.test(email))  $('[name="validation-msg"]').html("Please enter proper email id");
                            else if(cno!="" && (cno.length!=10 || !numberRegex.test(cno)))  $('[name="validation-msg"]').html("Please enter proper phone number");
                            else if(emailcheck==1) $('[name="validation-msg"]').html("Email is already taken");
                            else if(fname!="" && !nameRegex.test(fname)) $('[name="validation-msg"]').html("Enter a valid Firstname");
                            else if(lname!="" && !nameRegex.test(lname)) $('[name="validation-msg"]').html("Enter a valid Lastname");
                            else $('[name="validation-msg"]').html("Please enter all the details properly before proceeding");
                            $('[name="contact-form-btn"]').prop("disabled", true);
                        } 
                    })
}
JS;
$this->registerJS($script);
?>
