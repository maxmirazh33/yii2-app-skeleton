<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>

<?= \yii\widgets\Menu::widget([
    'items' => \frontend\models\Menu::generateItems(),
]) ?>

<?= $content ?>

<footer>
    <p>&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
</footer>

<?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>
