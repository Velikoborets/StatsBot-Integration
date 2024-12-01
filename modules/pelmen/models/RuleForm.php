<?php

namespace app\modules\pelmen\models;

use yii\base\Model;

class RuleForm extends Model
{
    public $column1;
    public $operator1;
    public $value1;
    public $column2;
    public $operator2;
    public $value2;

    public function rules()
    {
        return [
            [['column1', 'operator1', 'value1', 'column2', 'operator2', 'value2'], 'required'],
            [['value1', 'value2'], 'number'],
            [['column1', 'operator1', 'column2', 'operator2'], 'string'],
        ];
    }

    public static function getColumns()
    {
        return [
            'name' => 'Name',
            'clicks' => 'Clicks',
            'leads' => 'Leads',
            'cost' => 'Cost',
            'profit' => 'Profit',
            'roi' => 'ROI',
            'date' => 'Date',
        ];
    }

    public static function getOperators()
    {
        return [
            '>' => '>',
            '<' => '<',
            '=' => '=',
            '>=' => '>=',
            '<=' => '<=',
        ];
    }
}
