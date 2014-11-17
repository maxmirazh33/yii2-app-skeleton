<?php
/**
 * @var yii\web\View $this
 * @var yii\bootstrap\ActiveForm $form
 * @var \backend\models\LoginForm $model
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход | Панель управления | ' . Yii::$app->name;
?>

<div class="form-box" id="login-box">
    <div class="header">Авторизация</div>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <div class="body bg-gray">
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>

    <div class="footer">
        <?= Html::submitButton('Войти',
            ['class' => 'btn bg-olive btn-block', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
