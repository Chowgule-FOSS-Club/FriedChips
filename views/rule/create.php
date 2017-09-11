<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthRule */

$this->title = 'Create Auth Rule';
$this->params['breadcrumbs'][] = ['label' => 'Auth Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
        if(isset($flag)){
            if($flag==0){
                $msg = <<< DATA
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Rule already present
            </div>
DATA;
            echo $msg;
            }
            
        }
    ?>
<div class="auth-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
