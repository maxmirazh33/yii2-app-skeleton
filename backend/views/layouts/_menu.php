<?php
/**
 * @var \yii\web\View $this
 */

use backend\widgets\Menu;

echo Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => [
        [
            'label' => 'Настройки',
            'url' => ['/settings'],
            'icon' => 'fa-gear',
            'active' => Yii::$app->controller->id == 'settings',
        ],
        [
            'label' => 'Меню',
            'url' => ['/menu'],
            'icon' => 'fa-sitemap',
            'active' => Yii::$app->controller->id == 'menu',
        ],
    ]
]);
