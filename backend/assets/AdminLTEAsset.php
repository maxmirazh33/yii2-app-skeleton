<?php
namespace backend\assets;

use yii\web\AssetBundle;

class AdminLTEAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/adminlte';
    public $js = [
        'js/AdminLTE/app.js'
    ];
    public $css = [
        'css/AdminLTE.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
