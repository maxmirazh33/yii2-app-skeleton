<?php
namespace backend\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/bower/font-awesome';
    /**
     * @inheritdoc
     */
    public $css = [
        'css/font-awesome.min.css'
    ];
}
