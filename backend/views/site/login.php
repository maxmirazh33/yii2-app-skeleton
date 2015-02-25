<?php
/**
 * @var yii\web\View $this
 * @var yii\bootstrap\ActiveForm $form
 * @var \backend\models\LoginForm $model
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="login-box">
    <div class="login-logo">
        <?= Yii::$app->name ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Авторизация</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="form-group has-feedback">
            <?= $form->field($model, 'username') ?>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
