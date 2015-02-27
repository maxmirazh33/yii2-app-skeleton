<?php
namespace backend\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class Menu extends \common\models\Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'sort_index'], 'integer'],
            [['label', 'url'], 'safe'],
        ];
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
