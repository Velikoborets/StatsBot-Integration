<?php

namespace app\modules\statistic\models;

/**
 * This is the model class for table "statistics".
 *
 * @property int $id
 * @property string $name
 * @property int|null $clicks
 * @property int|null $leads
 * @property float|null $cost
 * @property float|null $profit
 * @property float|null $roi
 * @property string $date
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['clicks', 'leads'], 'integer'],
            [['cost', 'profit', 'roi'], 'number'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'clicks' => 'Clicks',
            'leads' => 'Leads',
            'cost' => 'Cost',
            'profit' => 'Profit',
            'roi' => 'Roi',
            'date' => 'Date',
        ];
    }
}
