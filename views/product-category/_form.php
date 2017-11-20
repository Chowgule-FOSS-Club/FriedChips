<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;use 
app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(
        ); ?>

     <?= $form->field($model,'pid')->dropDownList(
        ArrayHelper::map(Product::find()->all(), 'pid','name'),
        ['prompt'=>'Select Product']
    ) ?>

    <?= $form->field($model,'cid')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'cid','name'),
        ['prompt'=>'Select Category']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
