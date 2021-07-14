<?php


namespace app\models;


use yii\db\ActiveRecord;

class Actor extends ActiveRecord
{
    public static function tableName()
    {
        return 'actor';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'string'],
        ];
    }

}
