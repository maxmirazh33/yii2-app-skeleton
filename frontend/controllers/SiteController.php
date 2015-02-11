<?php
namespace frontend\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Default app action
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
