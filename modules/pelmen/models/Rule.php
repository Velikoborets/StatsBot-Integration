<?php

namespace app\modules\pelmen\models;

use app\modules\user\models\User;

/**
 * This is the model class for table "rules".
 *
 * @property int $id
 * @property int $user_id
 * @property string $column1
 * @property string $operator1
 * @property float $value1
 * @property string $column2
 * @property string $operator2
 * @property float $value2
 * @property string|null $created_at
 *
 * @property User $user
 */
class Rule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'column1', 'operator1', 'value1', 'column2', 'operator2', 'value2'], 'required'],
            [['user_id'], 'integer'],
            [['value1', 'value2'], 'number'],
            [['created_at'], 'safe'],
            [['column1', 'operator1', 'column2', 'operator2'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'index' => 'Index',
            'user_id' => 'User ID',
            'column1' => 'Column1',
            'operator1' => 'Operator1',
            'value1' => 'Value1',
            'column2' => 'Column2',
            'operator2' => 'Operator2',
            'value2' => 'Value2',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Get rule index
     *
     * @return index rule
     */
    public function getIndex()
    {
        $rules = self::find()->where(['user_id' => $this->user_id])->orderBY('id')->all();
        foreach ($rules as $index => $rule) {
            if ($rule->id == $this->id) {
                return $index + 1;
            }
        }
        return null;
    }
}
