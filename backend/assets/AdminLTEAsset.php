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
        'js/AdminLTE/app.js'
    ];
    /**
     * @inheritdoc
     */
    public $css = [
        'css/AdminLTE.css',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
