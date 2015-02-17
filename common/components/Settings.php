<?php
namespace common\components;

use yii\caching\Cache;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\validators\Validator;
use Yii;

/**
 * @property string $name
 * @property string $value
 * @property string $label
 * @property string $type
 */
class Settings extends ActiveRecord
{
    const TYPE_STRING = 'string';
    const TYPE_INTEGER = 'integer';
    const TYPE_FLOAT = 'number';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_URL = 'url';
    const TYPE_EMAIL = 'email';
    const TYPE_TEXT = 'safe';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'value' => $this->label,
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['value'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        $validator = Validator::createValidator($this->type, $this, ['value']);
        $this->validators->append($validator);

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        if ($cache instanceof Cache) {
            $cache->delete('settings');
        }

        parent::afterSave($insert, $changedAttributes);
    }

    public static function getDataForDetailView()
    {
        $models = static::getAll();
        $ret = [];
        foreach ($models as $model) {
            $ret['model'][$model->name] = $model->value;
            $type = in_array($model->type, ['url', 'email', 'boolean']) ? $model->type : 'text';
            if ($model->type == 'safe') {
                $type = 'html';
            }
            $ret['attributes'][] = $model->name . ':' . $type . ':' . $model->label;
        }

        return $ret;
    }

    public static function getAll()
    {
        $cache = Yii::$app->cache;
        if ($cache instanceof Cache) {
            $models = $cache->get('settings');
            if ($models === false) {
                $models = static::find()->all();
                $cache->set('settings', $models);
            }

            return $models;
        }

        return static::find()->all();
    }

    public static function get($name)
    {
        $models = ArrayHelper::index(static::getAll(), 'name');
        if (array_key_exists($name, $models)) {
            return $models[$name]->value;
        }

        return null;
    }
}
