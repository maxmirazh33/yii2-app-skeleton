<?php
/**
 * @var yii\web\View $this
 * @var array $model
 * @var array $attributes
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'Настройки | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Настройки';
$this->params['title'] = 'Настройки';
?>

<div class="settings-index">

    <p>
        <?= Html::a('Редактировать', ['edit'], ['class' => 'btn btn-primary glyphicon-pencil']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>
