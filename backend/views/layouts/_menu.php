<?php
/**
 * @var \yii\web\View $this
 */

use backend\components\Menu;

echo Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    //samples
    'items' => [
        [
            'label' => 'Меню',
            'url' => ['test'],
            'icon' => 'fa-dashboard',
            'active' => Yii::$app->controller->id == 'test',
        ],
        [
            'label' => 'Меню2',
            'icon' => 'fa-gear',
            'items' => [
                [
                    'label' => 'Меню3',
                    'url' => ['/site/index'],
                ],
            ]
        ],
    ]
]);
