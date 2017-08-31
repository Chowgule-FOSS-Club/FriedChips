<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Permissions */
/* @var $form ActiveForm */
?>
<div class="create-permission">
    
    
    
    <?php 
        $alertMsg = <<< HTML

        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Successful!</strong> new permission added!
    </div>
        
HTML;
        if(!empty($status)){
            echo $alertMsg;
        }
    ?>

    <?php $form = ActiveForm::begin([
        'id' => 'permission-form',
        'enableAjaxValidation' => true
    ]
   ); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create-permission -->
<?php
    $script = <<<JS
    $(document).ready(function(){
        $('.alert-success').delay(4000).fadeOut();;
    });
JS;
    $this->registerJS($script);
?>