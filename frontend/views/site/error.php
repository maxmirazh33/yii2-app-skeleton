<?php
/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

use yii\helpers\Html;

$this->title = "$name | " . Yii::$app->name;
?>

<h1><?= Html::encode($name) ?></h1>

<div>
    <?= nl2br(Html::encode($message)) ?>
</div>
