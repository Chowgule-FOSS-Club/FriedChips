<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\roles\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin([
        'id' => 'assignment-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(Users::find()->all(), "userid", "email")) ?>

    <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getRoles(), "name", "name")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Assign' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
