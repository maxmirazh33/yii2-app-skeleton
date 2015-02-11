<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
use backend\assets\BackendAsset;

BackendAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>

<body class="skin-blue<?= Yii::$app->controller->layout == 'base' ? ' bg-black' : '' ?>">

<?php $this->beginBody(); ?>
<?= $content ?>
<?php $this->endBody(); ?>

</body>

</html>
<?php $this->endPage(); ?>
