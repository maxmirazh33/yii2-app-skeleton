<?php
namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Model;

class Menu extends search\Menu
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->loadDefaultValues();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'url'], 'required'],
            [['parent_id'], 'in', 'range' => array_keys(static::getMenusForDropdown())],
            [['sort_index'], 'integer'],
            [['label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            Model::scenarios(),
            ['update' => static::attributes()]
        );
    }
}
