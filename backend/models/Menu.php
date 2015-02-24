<?php
namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\base\Model;

class Menu extends \common\models\Menu
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->scenario != 'search') {
            $this->loadDefaultValues();
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'url'], 'required', 'except' => ['search']],
            [['parent_id'], 'in', 'range' => array_keys(static::getMenusForDropdown()), 'except' => ['search']],
            [['sort_index'], 'integer', 'except' => ['search']],
            [['label'], 'string', 'max' => 255, 'except' => ['search']],

            [['id', 'parent_id', 'sort_index'], 'integer', 'on' => ['search']],
            [['label', 'url'], 'safe', 'on' => ['search']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            Model::scenarios(),
            ['search' => ['id', 'label', 'url', 'parent_id', 'sort_index']],
            ['update' => ['id', 'label', 'url', 'parent_id', 'sort_index']]
        );
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = static::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'sort_index' => $this->sort_index,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }

    /**
     * @return array as id => label for Menu relation models
     */
    public function getMenusForDropdown()
    {
        $query = new ActiveQuery($this->className());
        if (isset($this->id)) {
            $query->where('id <> :id', [':id' => $this->id]);
        }

        return ArrayHelper::map($query->all(), 'id', 'label');
    }
}
