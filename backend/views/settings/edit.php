<?php
/**
 * @var yii\web\View $this
 * @var common\components\Settings[] $models
 * @var yii\widgets\ActiveForm $form
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\Settings;

$this->title = 'Настройки | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
$this->params['title'] = "Редактировать настройки";
?>

<div class="settings-update">

    <p>
        <?= Html::a('Просмотр', ['index'], ['class' => 'btn btn-flat btn-primary glyphicon-eye-open']) ?>
    </p>

    <div class="settings-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="errorSummary">
            <?= $form->errorSummary($models) ?>
        </div>

        <?php foreach($models as $name => $model) {
            switch ($model->type) {
                case Settings::TYPE_BOOLEAN:
                    echo $form->field($model, "[$name]value")->checkbox();
                    break;
                case Settings::TYPE_TEXT:
                    echo $form->field($model, "[$name]value")->widget('backend\widgets\ImperaviWidget');
                    break;
                default:
                    echo $form->field($model, "[$name]value");
            }
        }
        ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-flat btn-primary glyphicon-ok']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
