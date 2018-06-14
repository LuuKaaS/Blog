<?php
 namespace app\modules\admin\controllers;
 
 use Yii;
 use yii\web\Controller;
 use app\models\ActiveRecord\Comment;
 
 Class CommentController extends Controller
 {
     public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();
        
        return $this->render('index',['comments'=>$comments]);
    }
    
    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        var_dump($comment);die;
        if($comment->delete())
        {
            return $this->redirect(['index']);
        }
    }
 }       