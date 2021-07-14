<?php


namespace app\modules\v1\controllers;


use app\models\Show;
use app\models\ShowSearch;
use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class ShowController extends Controller
{
    public function actionIndex() {
        $searchModel = new ShowSearch();
        return $searchModel->search($searchModel->search(Yii::$app->request->queryParams));
    }

    public function actionRate($id) {
        $model = Show::findOne($id);
        if(empty($model)) {
            throw new NotFoundHttpException('Show not found');
        }
        $newRating = Yii::$app->request->post('rating');
        $model->setRating($newRating);
        $model->save();
        return ['success' => true];
    }

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['http://localhost:4200'],
                    'Access-Control-Allow-Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'HEAD', 'OPTIONS', 'PATCH'],
                    'Access-Control-Request-Headers' => ['X-Wsse', 'Content-Type'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 3600,
                    'Access-Control-Expose-Headers' => ['*'],
                ],

            ]
        ];
    }

}
