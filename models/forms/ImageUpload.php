<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;
    
    public function uploadFile($file)
    {
        //print_r(Yii::getAlias('@web'));exit;
        $file->saveAs('C:\xampp\htdocs\Blog\web\uploads\\'. $file->name);
        return $file->name;
    }
}