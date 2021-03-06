<?php 
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use app\models\UserCustomer;
use app\models\Users;
?>
<div class="container">

<div id="alert-div" align="center" style="display:none;">
</div>  
<div id="loading-img" style="display:none;width:50%;height:40%;position:fixed;top:30%;left:45%;padding:2px;z-index:105">
        <img src='images/loading.gif'/>
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
                                                    <div class="col-xs-12" id="prod-question">
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
                                                    <div class="col-xs-12" id="finalize-div">
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

            <div class="row" style="margin: 0px">
                <div class=" col-md-4">

                    <div>
                        <div class="img-card1">
                            <img class="img-responsive" src="<?=$product[0]->image?>" />

                            <br />
                        </div>

                        <div class="btcnt" style="text-align:center">

                             <button type="submit" class="btnview btn-responsive" data-target="#modal-1" data-toggle="modal" name='enquire' value=<?= $product[0]->pid ?>><p >ENQUIRE</p></button> 
                        
                        </div>
                    </div>

                </div>
                <div class=" col-sm-8">
                    <h2 class="h2title"><?=$product[0]->name?></h2>
                    <hr class="hr-primary">

                    <p class="info">
                       <?=$product[0]->description?>
                    </p>
                </div>

                


            </div>

        </div>
        

    </div>

    <?php
   $script = <<< JS
    $('document').ready(function(){
        validate();
        $('[name="InputFname"] , [name="InputLname"], [name="InputEmail"] , [name="InputCno"] , [name="InputPass"]').bind('input propertychane' ,validate);
        var contactDetails;
        var data;
        var pid;
        $('[name="enquire"]').click(function(){
        $('#prod-question').html("");
        var id = $(this).val();
        pid = id;

        $(document).ajaxStart(function(){
            $("#loading-img").css("display", "block");
        });

        $(document).ajaxComplete(function(){
            $("#loading-img").css("display", "none");
        });

        $.get('index.php?r=product/display-questions' , { id : id} , function(data){
            var raw = data;
            data = $.parseJSON(data);
            for(i=0 ; i<Object.keys(data).length ; i++){
                $('#prod-question').append("<div class='q'></div> "+data[i].name + '<br/>' +
                    '<input type="text" name="' + data[i].qid + '" class="form-control" /> <br/>' 
                );
            }
            $('#prod-question').append('<br/>' +
                    '<input type="hidden" name="all-questions"/> ');
            $('[name="all-questions"]').val(raw);
            })
        });

        $('[name="prod-question-btn"]').click(function(){
            var fname = $('[name="InputFname"]').val();
            var lname = $('[name="InputLname"]').val();        
            var email = $('[name="InputEmail"]').val();
            var cno = $('[name="InputCno"]').val();
            var password = "test123";
            contactDetails = {
                "fname" : fname,
                "lname" : lname,
                "email" : email,
                "cno" : cno,
                "password" : password
                };
            data = $('[name="all-questions"]').val();
            data = $.parseJSON(data);
            finalString = '<section>First Name:</section> '+fname + '<br>' +'<section>Last Name:</section> '+ lname + '<br>' + '<section>Email:</section> '+email + '<br>';
            
            finalString += '<section>Contact No:</section> '+cno + '<br>';
            $('#finalize-div').html(finalString);
            for(i=0 ; i<Object.keys(data).length ; i++){
                    var answer = $('[name="' + data[i].qid + '"]').val();
                    $('#finalize-div').append("<section id='a'>"+data[i].name + '</section> : '  + answer + '<br/>');
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
                            if(data != ""){
                                window.scrollTo(0,0);
                                var alertdiv = $('#alert-div');
                                alertdiv.html(data);
                                alertdiv.css('display','block');
                                if(data == "Your data has been submitted" ) alertdiv.attr('class','alert alert-success');
                                else alertdiv.attr('class','alert alert-danger');
                                setTimeout(function() {
                                    alertdiv.css('display','none');
                                }, 4000);
                            }
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
                        if (fname.length   >   0   &&
                            lname.length  >   0   &&
                            email.length    >   0 &&
                            cno.length    ==   10  &&
                            numberRegex.test(cno) &&
                            nameRegex.test(fname) &&
                            nameRegex.test(lname) &&
                            emailRegex.test(email) ){
                            $('[name="validation-msg"]').html("You can now proceed!");
                            $('[name="validation-msg"]').css('color' , 'green');
                            $('[name="contact-form-btn"]').prop("disabled", false);
                        }
                        else {
                            $('[name="validation-msg"]').css('color' , 'red');                            
                            if(email!="" && !emailRegex.test(email))  $('[name="validation-msg"]').html("Please enter proper email id");
                            else if(cno!="" && (cno.length!=10 || !numberRegex.test(cno)))  $('[name="validation-msg"]').html("Please enter proper phone number");
                            
                            else if(fname!="" && !nameRegex.test(fname)) $('[name="validation-msg"]').html("Enter a valid Firstname");
                            else if(lname!="" && !nameRegex.test(lname)) $('[name="validation-msg"]').html("Enter a valid Lastname");
                            else $('[name="validation-msg"]').html("Please enter all the details properly before proceeding");
                            $('[name="contact-form-btn"]').prop("disabled", true);
                        } 
                    
}
JS;
$this->registerJS($script);
?>