<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\roles\RulePermission;

/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$this->title = 'Create Rule Permission';
?>

<div class="auth-item-form">
    <h1><?= HTML::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'permission')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getPermissions(), 'name', 'name')) ?>

    <?= $form->field($model, 'ruleName')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getRules(), 'name', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

