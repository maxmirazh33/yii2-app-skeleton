<?php
namespace backend\assets;

use yii\web\AssetBundle;

class AdminLTEAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    /**
     * @inheritdoc
     */
    public $js = [
        'dist/js/app.min.js',
        'plugins/iCheck/icheck.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
    ];
    /**
     * @inheritdoc
     */
    public $css = [
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-blue.min.css',
        'plugins/iCheck/all.css',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
