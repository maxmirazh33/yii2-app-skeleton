<?php
/**
 * @var yii\web\View $this
 * @var backend\models\Menu $model
 * @var yii\widgets\ActiveForm $form
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="errorSummary">
        <?= $form->errorSummary([$model]) ?>
    </div>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList($model->getMenusForDropDown(), ['prompt' => 'Нет']) ?>

    <?= $form->field($model, 'sort_index')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success glyphicon-ok' : 'btn btn-primary glyphicon-ok']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
