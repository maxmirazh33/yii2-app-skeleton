<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
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
    public $css = [];
    /**
     * @inheritdoc
     */
    public $js = [];
    /**
     * @inheritdoc
     */
    public $depends = [];
}
