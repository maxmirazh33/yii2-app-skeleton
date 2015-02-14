<?php
namespace backend\components;

use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class ImperaviWidget extends Widget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->settings = ArrayHelper::merge(
            $this->settings,
            [
                'lang' => 'ru',
                'minHeight' => 200,
                'buttonSource' => true,
                'replaceDivs' => false,
                'plugins' => [
                    'clips',
                    'filemanager',
                    'fontcolor',
                    'fontfamily',
                    'fontsize',
                    'imagemanager',
                    'table',
                    'video',
                    'fullscreen',
                ],
                'imageManagerJson' => Url::to(['/site/images-get']),
                'fileManagerJson' => Url::to(['/site/files-get']),
                'fileUpload' => Url::to(['/site/file-upload']),
                'imageUpload' => Url::to(['/site/image-upload']),
            ]
        );
    }
}
