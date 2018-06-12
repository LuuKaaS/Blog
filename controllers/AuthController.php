<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ActiveRecord\User;
use app\models\forms\LoginForm;
use app\models\forms\SignupForm;


class AuthController extends Controller
{
       public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        
        return $this->render('\login', [
            'model' => $model,
        ]);
    }
   
   
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSignup() 
    {
        $model = new SignupForm();
        
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('signup', ['model' => $model]);
    }
    
    public function actionTest()
    {
        $user = User::findOne(1);
        
        Yii::$app->user->login($user);
        
        if(Yii::$app->user->isGuest)
        {
            echo "jsi host";
        }else{
            echo "jsi přihlášen";
        }
    }
}