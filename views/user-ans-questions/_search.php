<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserAnsQuestionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-ans-questions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'created_time') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'qid') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'isRead') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
