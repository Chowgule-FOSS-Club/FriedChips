<?php 
  use app\models\UserAnsQuestions;
  use app\models\Users;
  use app\models\Product;
  use app\models\Questions;
  use app\models\UserCustomer;
  use yii\helpers\Html;
?>

<?php 
    $this->title = 'Customer Queries';
    $this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $count = 0;
    $idGen = "div".$count;
    $queries = UserAnsQuestions::find()->select('created_time')->distinct()->orderBy('created_time DESC')->all();
    
?>
<div class="row">
    <h1><?= Html::encode($this->title) ?></h1><br>
    <div class="col-md-12">
      <div class="panel-group" id="accordion">
      <?php foreach($queries as $query){
        $flag;
         $current_queries = UserAnsQuestions::find()->where(['created_time' => $query->created_time])->all();
         foreach($current_queries as $singleQuery){
            $flag = $singleQuery->isRead;
            $user = Users::findOne($singleQuery->uid);
            $product = Product::findOne($singleQuery->pid);
            break;
         }
        ?>
        
        <div class="panel panel-default">
            <div class="panel-heading card" style="background-color: <?php echo  $flag=="true" ? "white" : "#1ABB9C;";  ?>"    data-toggle="collapse" data-parent="#accordion" href="#<?= $idGen; ?>" data-id="<?= $query->created_time; ?>">
                <h4 class="panel-title">
                    <div class='row'>
                        <div class='col-md-4'>
                            <?php  echo $user->getName();  ?>
                            <?php echo " - ". $product->name ?>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-2">
                        <?php echo $query->created_time ?>
                        </div>
                    </div>
                    
                </h4>
            </div>
            <div id="<?= $idGen; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <?php 
                                echo "<h3>User Details</h3>";
                                echo "<b>Name:</b> ". $user->getName()."<br>";
                                echo "<b>Email:</b> ". $user->email."<br>";
                                echo "<b>Phone Number:</b> ". UserCustomer::findOne($user->userid)->phone."<br>";
                            ?>
                        </div>
                        <div class="col-md-6">
                        <?php
                            echo "<h3>Questions</h3>";
                            foreach($current_queries as $questions){
                                $question = Questions::findOne($questions->qid);
                                echo "<b>".$question->name. "</b>: ".$questions->answer. "<br>";
                            }
                        ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php 
      $count = $count+1;
      $idGen = "div". $count;
    } 
    ?>
    </div>
    </div>
</div>

<?php 
    $script = <<< JS
        $(document).ready(function(){
            $(".card").click(function(){
                console.log($(this).attr("data-id"));
                var id = $(this).attr("data-id");
                
                $(document).ajaxStart(function(){
                    //$("#loading-img").css("display", "block");
                });
        
                $(document).ajaxComplete(function(){
                    
                });

                $(this).css("background-color", "white");
                $.get('index.php?r=query/change-flag' , { id : id} , function(data){
                    console.log(data);
                });

                $.get('index.php?r=query/count' , { id : id} , function(data){
                    console.log(data);
                    $("small[class='label pull-right']").html("("+data+")");
                });
            });
        });
JS;
    $this->registerJS($script);
?>