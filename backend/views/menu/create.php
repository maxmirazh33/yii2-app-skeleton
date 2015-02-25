<?php
/**
 * @var yii\web\View $this
 * @var backend\models\Menu $model
 */

use yii\helpers\Html;

$this->title = 'Добавить меню | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
$this->params['title'] = 'Добавить пункт меню';
?>

<div class="menu-create">

    <p class="clear">
        <?= Html::a('Все пункты меню', ['index'], ['class' => 'btn btn-flat btn-info btn-right glyphicon-list']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
