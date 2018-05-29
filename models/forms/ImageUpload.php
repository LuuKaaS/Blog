<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;
    
    function rules ()
    {
        return[
                [['image'], 'required'],
                [['image'], 'file', 'extensions' =>'jpg,png']
            ];
    }


    public function uploadFile($file, $currentImage)
    {
        $this->image = $file;
        
        if ($this->validate())
            {     
            $this->deleteCurrentImage($currentImage);
           
            return $this->saveImage();
            }
    }
    
    private function getFolder()
    {
        return 'C:\xampp\htdocs\Blog\web\uploads\\';
    }
    
    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->image->baseName)) .".". $this->image->extension);
    }
    
    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage))
        {
                unlink($this->getFolder() . $currentImage);
        }
    }
    
    public function fileExists($currentImage)
    {
        if (!empty($currentImage)&& $currentImage != null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }
    
    public function saveImage()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder(). $filename);
        return $filename;
    }
}