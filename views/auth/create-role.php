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
$this->title = 'Create Role';
?>

<div class="auth-item-form">
    <h1><?= HTML::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'role-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permissions')->checkboxList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
