<?php
/**
 * @var yii\web\View $this
 * @var backend\models\search\Menu $searchModel
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Меню | Панель управления | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Меню';
$this->params['title'] = 'Меню';
?>

<div class="menu-index">

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-flat btn-success glyphicon-plus']) ?>
    </p>

    <div class="box box-primary">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n<div class='row'>{summary}{pager}</div>",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'label',
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'url',
                    'value' => function ($model) {
                        return Html::a(
                            $model->url,
                            preg_match('/^(http:\/\/|https:\/\/)/', $model->url)
                                ? $model->url
                                : Yii::$app->frontendUrlManager->createUrl($model->url)
                        );
                    },
                    'format' => 'raw',
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'parent_id',
                    'value' => function ($model) {
                        return isset($model->parent)
                            ? Html::a($model->parent->label, Url::toRoute(['/menu/view', 'id' => $model->parent_id]))
                            : Yii::$app->formatter->nullDisplay;
                    },
                    'filter' => $searchModel->getMenusForDropdown(),
                    'format' => 'raw',
                ],
                'sort_index',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>

</div>
