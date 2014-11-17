<?php
namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [];
    public $css = [
        'css/site.css',
    ];
    public $depends = [
        'backend\assets\AdminLTEAsset',
        'backend\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
    ];
}
