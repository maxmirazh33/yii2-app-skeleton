<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @inheritdoc
 */
class Menu extends \common\models\Menu
{
    /**
     * @inheritdoc
     */
    public static function find()
    {
        $query = new ActiveQuery(static::className());
        $query->orderBy(['sort_index' => SORT_ASC]);

        return $query;
    }

    /**
     * Generate menu items for yii\widgets\Menu
     * @param null|array $models
     * @return array
     */
    public static function generateItems(array $models = null)
    {
        $items = [];
        if ($models === null) {
            $models = static::find()->where(['parent_id' => null])->with('children')->all();
        }
        foreach ($models as $model) {
            $url = preg_match('/^(http:\/\/|https:\/\/)/', $model->url) ? $model->url : '/' . trim($model->url, '/') . '/';
            $items[] = [
                'url' => $url,
                'label' => $model->label,
                'items' => static::generateItems($model->children),
            ];
        }

        return $items;
    }
}
