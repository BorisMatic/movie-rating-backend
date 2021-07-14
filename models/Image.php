<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\Response;

class Image extends ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['storage_key', 'original_name', 'mime_type'], 'string'],
            [['file'], 'safe']
        ];
    }

    public function getFile()
    {

        //var_dump($this);die();

        return readfile(dirname(__DIR__) . '\uploads\\' . $this->storage_key);
    }
}
