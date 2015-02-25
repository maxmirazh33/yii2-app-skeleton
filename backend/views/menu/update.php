<?php
/**
 * @var yii\web\View $this
 * @var backend\models\Menu $model
 */

use yii\helpers\Html;

$this->title = $model->label . ' | Меню | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->label;
$this->params['title'] = "Редактировать пункт меню '$model->label'";
?>

<div class="menu-update">

    <p>
        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-flat btn-primary glyphicon-eye-open']) ?>
        <?= Html::a(
            'Удалить',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-flat btn-danger glyphicon-trash',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
            ]
        ) ?>
        <?= Html::a('Все пункты меню', ['index'], ['class' => 'btn btn-flat btn-info btn-right glyphicon-list']) ?>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-flat btn-success btn-right glyphicon-plus']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
