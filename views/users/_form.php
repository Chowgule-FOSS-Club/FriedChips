<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data'],
        'id' => 'contact-form',
        'enableAjaxValidation' => true]
    ); ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true])->label("First Name"); ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true])->label("Surname"); ?>




     
    <?php 
        if(empty($model->userid)){
            echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
            echo $form->field($model, 'imageFile')->widget(FileInput::classname());
        }
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
