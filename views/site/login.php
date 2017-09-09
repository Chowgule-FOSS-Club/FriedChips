<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\assets\LoginAsset;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<div class="login-container">
    
    <div class="row">
        
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h1 ><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true ]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            
        </div>
        
    </div>
    
    
</div>
