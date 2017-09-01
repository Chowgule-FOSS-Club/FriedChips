<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

    $form = ActiveForm::begin();
?>

<?= $form->field($model, 'imageFile')->widget(FileInput::classname()); ?>
<div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
</div>
<?php
    ActiveForm::end();
?>
