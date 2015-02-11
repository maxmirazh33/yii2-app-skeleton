<?php
namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $basePath = '@webroot';
    /**
     * @inheritdoc
     */
    public $baseUrl = '@web';
    /**
     * @inheritdoc
     */
    public $js = [];
    /**
     * @inheritdoc
     */
    public $css = [
        'css/site.css',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'backend\assets\AdminLTEAsset',
        'backend\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
    ];
}
