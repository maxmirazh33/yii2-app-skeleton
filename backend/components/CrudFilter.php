<?php
namespace backend\components;

use yii\base\ActionFilter;
use yii\web\NotFoundHttpException;

class CrudFilter extends ActionFilter
{
    /**
     * @var array actions allowed to owner controller
     */
    public $actions = [];
    /**
     * @inheritdoc
     */
    public $only = [
        'index',
        'create',
        'update',
        'delete',
        'view',
    ];

    /**
     * @inheritdoc
     */
    public function beforeFilter($event)
    {
        $action = $this->owner->action;

        if (in_array($action->id, $this->only) && !in_array($action->id, $this->actions)) {
            throw new NotFoundHttpException('Страница не найдена.');
        }

        return true;
    }
}
