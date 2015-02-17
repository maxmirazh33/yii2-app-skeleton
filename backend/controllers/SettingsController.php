<?php
namespace backend\controllers;

use backend\components\BackendController;
use backend\components\CrudFilter;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class SettingsController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'crud' => [
                'class' => CrudFilter::className(),
                'actions' => ['index'],
            ],
        ];
    }

    public function actionIndex()
    {
        $data = Yii::$app->settings->getDataForDetailView();
        return $this->render('index', ['model' => $data['model'], 'attributes' => $data['attributes']]);
    }

    public function actionEdit()
    {
        $models = Yii::$app->settings->getAll();
        $models = ArrayHelper::index($models, 'name');
        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                $model->save(false);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'models' => $models,
            ]);
        }
    }
}
