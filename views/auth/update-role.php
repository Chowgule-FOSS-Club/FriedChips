<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\roles\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$this->title = 'Update Role: ' . $model->name;
?>

<div class="auth-item-form">
    <h1><?= HTML::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'role-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'permissions')
                ->checkboxList(ArrayHelper::map(AuthItem::find()->where(['!=','name', $model->name])->all(), 'name', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    $options = "";
    foreach($model->permissions as $permission){
        $options = $options . "$(\"input[value='$permission->name']\").prop('checked', 'checked');";
    }


    $script = "$(document).ready(function(){" .
              "$options" .
              "});";           

$this->registerJS($script); 
?>