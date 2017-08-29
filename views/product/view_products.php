<?php 
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
?>
<script>
      
</script>  

                                                                                               
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
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                                                        <input type="text" name="InputName" placeholder="Enter Name" class="form-control" autofocus="autofocus" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope green"></i></span>
                                                        <input type="email" name="InputEmail" placeholder="Enter Email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone green"></i></span>
                                                        <input type="text" name="InputCno" placeholder="Phone : (+91)" class="form-control" required>
                                                    </div>
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
		        </button>
                    <h2>PRODUCT CATALOGS</h2>
                </div>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-large">
                            <a href="#" class=" btn  btn-outlined dropdown-toggle " data-toggle="dropdown">Search by Catagories <b class="caret"></b></a>

                            <ul class="dropdown-menu dropdown-menu-large row">
                            <?php foreach ($categorys as $category): ?>
                                <li class="col-sm-4">
                                    <ul>
                                        <li class="dropdown-header">  <?= $category->name?></li>
                                        <?php foreach ($category->ps as $products): ?>
                                        <li><a href="#"><?= $products->name ?></a></li>
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

            <?php foreach ($product as $products): ?>
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
                                <a class="btn">
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
                    '<input type="text" name="' + data[i].qid + '" /> <br/><br/>' 
                );
            }
            $('#prod-question').append('<br/>' +
                    '<input type="hidden" name="all-questions"/> <br/><br/>');
            $('[name="all-questions"]').val(raw);
            })
        });

        $('[name="prod-question-btn"]').click(function(){
            var name = $('[name="InputName"]').val();        
            var email = $('[name="InputEmail"]').val();
            var cno = $('[name="InputCno"]').val();
            data = $('[name="all-questions"]').val();
            data = $.parseJSON(data);
            $('#finalize-div').html(name + '<br>' + email + '<br>' + cno + '<br>');
            for(i=0 ; i<Object.keys(data).length ; i++){
                    var answer = $('[name="' + data[i].qid + '"]').val();
                    $('#finalize-div').append(data[i].name + ' : ' + answer + '<br/>');
                } 
        });

        $('[name="finalize-btn"]').click(function(){
            var answerJson = [];
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
                        data : JSON.stringify(answerJson) ,
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        _csrf: yii.getCsrfToken(),
                    } , function(data){
                            alert(data);
                        })            
                });
});
    
    
JS;
$this->registerJS($script);
?>
