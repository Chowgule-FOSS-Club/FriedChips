<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

    $form = ActiveForm::begin();
?>

<?= $form->field($model, "old_password")->passwordInput(['maxlength' => true]); ?>
<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]); ?>

<?= $form->field($model, "password_repeat")->passwordInput(['maxlength' => true]); ?>
<div class="form-group">
        <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary']) ?>
</div>
<?php
    ActiveForm::end();
?>
