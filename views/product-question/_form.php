<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Questions;
use yii\helpers\ArrayHelper;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $model app\models\ProductQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-question-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model,'pid')->dropDownList(
        ArrayHelper::map(Product::find()->all(), 'pid','name'),
        ['prompt'=>'Select Product']
    ) ?>

    <?= $form->field($model,'qid')->dropDownList(
        ArrayHelper::map(Questions::find()->all(), 'qid','name'),
        ['prompt'=>'Select Question']
    ) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'true' => 'True', 'false' => 'False', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
