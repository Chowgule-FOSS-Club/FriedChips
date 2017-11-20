<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\LoginAsset;


LoginAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-align">
<div class="login-container">

    <section class="login" id="login">
     <header>
                <h2>Salgaocar Engineers</h2>
              
    </header>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'class' => 'login-form',
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true , 'class' => 'login-input' , 'placeholder' => 'Username' ])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['class' => 'login-input' , 'placeholder' => 'Password'])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([]) ?>

            <div class="submit-container">
                <?= Html::submitButton('Login', ['class' => 'login-button', 'name' => 'login-button']) ?>
                </div>
    <?php ActiveForm::end(); ?>
    </section>
</div>
</div>