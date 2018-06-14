<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\ActiveRecord\Comment;

class CommentForm extends Model
{
    public $comment;
    
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' =>[3,255]],
            
        ];
    }
    
    public function saveComment($article_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id; 
        $comment->status = 0;  
        $comment->date = date('Y-d-m h:i:s');
//        var_dump($comment);die;
        return $comment->save();
    }
    
    public function deleteComment($id)
    {
        $comment = new Comment;
        $comment = Comment::findOne($id);
        return $comment->delete();
    }
}