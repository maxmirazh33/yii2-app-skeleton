<?php
/**
 * @var yii\web\View $this
 * @var backend\models\Menu $model
 */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->label . ' | Меню | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->label;
$this->params['title'] = "Пункт меню '$model->label'";
?>

<div class="menu-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-flat btn-primary glyphicon-pencil']) ?>
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

    <div class="box box-primary">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'label',
                'url:url',
                [
                    'attribute' => 'parent_id',
                    'value' => isset($model->parent)
                        ? Html::a($model->parent->label, Url::toRoute(['/menu/view', 'id' => $model->parent_id]))
                        : Yii::$app->formatter->nullDisplay,
                    'format' => 'raw',
                ],
                'sort_index',
            ],
        ]) ?>

    </div>

</div>
