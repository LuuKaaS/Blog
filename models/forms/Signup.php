<?php
   namespace app\models\forms;
   use Yii;
   use yii\base\Model;
   class Signup extends Model {
      public $username;
      public $password;
      public $email;
      
      public function rules() {
         return [
            // the username, password, email, attributes are
            //required
            [['username' ,'password', 'email'], 'required'],
            // the email attribute should be a valid email address
            ['email', 'email'],
         ];
      }
   }
?>