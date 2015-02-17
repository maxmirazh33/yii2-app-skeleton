<?php
/**
 * @var \yii\web\View $this
 */

use backend\components\Menu;

echo Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => [
        [
            'label' => 'Настройки',
            'url' => ['/settings'],
            'icon' => 'fa-gear',
            'active' => Yii::$app->controller->id == 'settings',
        ],
    ]
]);
