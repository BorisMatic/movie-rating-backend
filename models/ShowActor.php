<?php


namespace app\models;


use yii\db\ActiveRecord;

class ShowActor extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'show_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['show_id', 'actor_id'], 'required'],
        ];
    }
}
