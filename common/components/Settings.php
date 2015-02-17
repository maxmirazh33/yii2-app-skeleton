<?php
namespace common\components;

use yii\db\ActiveRecord;
use yii\validators\Validator;

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

    public static function getDataForDetailView()
    {
        $models = static::find()->all();
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
        return static::find()->all();
    }

    public static function get($name)
    {
        $model = static::findOne($name);
        if ($model === null) {
            return null;
        }

        return $model->value;
    }
}
