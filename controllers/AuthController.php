<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ActiveRecord\User;
use app\models\forms\LoginForm;


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

        $model->password = '';
        return $this->render('/site/login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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