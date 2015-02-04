<?php
namespace backend\controllers;

use backend\components\BackendController;
use backend\components\CrudFilter;
use vova07\imperavi\actions\GetAction;
use Yii;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use yii\helpers\Url;

class SiteController extends BackendController
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
            'images-get' => [
                'class' => GetAction::className(),
                'url' => Url::to('@frontendUrl/images', true),
                'path' => '@frontend/web/images',
                'options' => ['except' => ['.*']],
            ],
            'files-get' => [
                'class' => GetAction::className(),
                'url' => Url::to('@frontendUrl/files', true),
                'path' => '@frontend/web/files',
                'options' => ['except' => ['.*']],
                'type' => GetAction::TYPE_FILES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Url::to('@frontendUrl/images', true),
                'path' => '@frontend/web/images',
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Url::to('@frontendUrl/files', true),
                'path' => '@frontend/web/files',
                'uploadOnlyImage' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'crud' => [
                'class' => CrudFilter::className(),
                'actions' => ['index'],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            $this->goHome();
        }

        $this->layout = 'base';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/');
    }
}
