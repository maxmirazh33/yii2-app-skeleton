<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;

?>
<?php $this->beginContent('@backend/views/layouts/base.php'); ?>

<header class="header">
    <?= Html::a('Панель управления', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a('На сайт', '/', ['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a('Выход', ['/site/logout'], ['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">

    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left info">
                    <?= Yii::$app->formatter->asDatetime(time(), 'd MMMM Y, HH:mm') ?>
                </div>
            </div>
            <?= $this->render('_menu') ?>
        </section>
    </aside>

    <aside class="right-side">
        <section class="content-header">
            <h1>
                <?php if (isset($this->params['title'])): ?>
                    <?= Html::encode($this->params['title']) ?>
                <?php endif; ?>
            </h1>

            <?= Breadcrumbs::widget([
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>

        <section class="content">
            <?php if (Yii::$app->session->hasFlash('alert')): ?>
                <?= Alert::widget([
                    'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ]) ?>
            <?php endif; ?>
            <?= $content ?>
        </section>

    </aside>

</div><!-- ./wrapper -->

<?php $this->endContent(); ?>
