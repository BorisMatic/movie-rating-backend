<?php

namespace app\modules\v1\controllers;

use app\models\Image;
use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ImageController extends Controller
{
    protected function verbs()
    {
        return [
            'view' => ['GET', 'HEAD'],
        ];
    }

    public function actionView($id)
    {
        /** @var Image $image */
        $image = Image::findOne($id);

        if(empty($image)) {
            throw new NotFoundHttpException('Image not found');
        }

        Yii::$app->response->format = Response::FORMAT_RAW;
        header('Content-type:' . $image->mime_type);


        return $image->getFile();
    }

    public function actionIndex() {
        return ['asdasdasd' => 'asdasdas'];
    }

}
