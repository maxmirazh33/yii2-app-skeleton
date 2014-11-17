<?php
namespace backend\components;

use yii\base\ActionFilter;
use yii\web\NotFoundHttpException;

class CrudFilter extends ActionFilter
{
    public $actions = [];
    public $only = [
        'index',
        'create',
        'update',
        'delete',
        'view',
    ];

    public function beforeFilter($event)
    {
        $action = $this->owner->action;

        if (in_array($action->id, $this->only) && !in_array($action->id, $this->actions)) {
            throw new NotFoundHttpException('Страница не найдена.');
        }

        return true;
    }
}
