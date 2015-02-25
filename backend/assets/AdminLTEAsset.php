<?php
namespace backend\assets;

use yii\web\AssetBundle;

class AdminLTEAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/bower/adminlte';
    /**
     * @inheritdoc
     */
    public $js = [
        'dist/js/app.js',
        'plugins/iCheck/icheck.js',
        'plugins/slimScroll/jquery.slimscroll.js',
    ];
    /**
     * @inheritdoc
     */
    public $css = [
        'dist/css/AdminLTE.css',
        'dist/css/skins/skin-blue.css',
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
