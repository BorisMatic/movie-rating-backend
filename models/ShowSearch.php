<?php


namespace app\models;


use yii\data\ActiveDataProvider;
use yii\db\Query;

class ShowSearch extends Show
{
    public $search_term;
    public $actors;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description', 'image_url', 'description', 'search_term', 'type'], 'string'],
            [['total_votes', 'total_points', 'rating', 'id'], 'number'],
            ['release_date', 'date'],
            ['actors',  'safe']
        ];
    }

    public function search($params)
    {

        $query = Show::find();

        // add conditions that should always apply here
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params, '');

        if (!empty($this->search_term)) {
            $query = $query->where(['like', 'title', $this->search_term])
                ->orWhere(['like', 'description', $this->search_term]);
        }

        $query->andFilterWhere([
            'type' => $this->type,
            'rating' => $this->rating
        ]);

        $query->orderBy(['rating' => SORT_DESC]);

        // get the posts in the current page
        return $provider;
    }

    public
    function extraFields()
    {
        return [
            'actors' => function ($item) {
                $parent = $this->getActors()->with('person')->asArray()->one();
                return $parent;
            }
        ];
    }
}
