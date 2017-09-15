<?php 
  use app\models\UserAnsQuestions;
  use app\models\Users;
  use app\models\Product;
  use app\models\Questions;
?>

<?php 
    $count = 0;
    $idGen = "div".$count;
    $queries = UserAnsQuestions::find()->select('created_time')->distinct()->all();
    
?>
<div class="row">
    <div class="col-md-12">
      <div class="panel-group" id="accordion">
      <?php foreach($queries as $query){
         $queries = UserAnsQuestions::find()->where(['created_time' => $query->created_time])->all();
         foreach($queries as $singleQuery){
            $user = Users::findOne($singleQuery->uid);
            $product = Product::findOne($singleQuery->pid);
            break;
         }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?= $idGen; ?>">
                        <?php  echo "Customer Name: ".$user->getName();  ?>
                        <?php echo "Product: ".$product->name ?>
                        <?php echo "Time: ".$query->created_time ?>
                    </a>
                </h4>
            </div>
            <div id="<?= $idGen; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                    foreach($queries as $questions){
                        $question = Questions::findOne($questions->qid);
                        echo $question->name. ": ".$questions->answer;
                    }
                ?>
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
