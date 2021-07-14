<?php


namespace app\models;


use yii\db\ActiveRecord;

class Show extends ActiveRecord
{
    public static function tableName()
    {
        return 'show';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description', 'image_id', 'description', 'type'], 'string'],
            [['total_votes', 'total_points', 'rating'], 'number'],
            ['release_date', 'safe'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::class, ['id' => 'actor_id'])
            ->via('showActors');
    }

    public function getShowActors()
    {
        return $this->hasMany(ShowActor::class, ['show_id' => 'id']);
    }

    public function extraFields()
    {
        return [
            'actors' => function ($item) {
                return $this->getActors()->asArray()->all();
            }
        ];
    }

    public function setRating($newRating) {
        $this->total_votes = $this->total_votes + 1;
        $this->total_points = $this->total_points + $newRating;
        $this->rating = round($this->total_points / $this->total_votes);
    }

}
