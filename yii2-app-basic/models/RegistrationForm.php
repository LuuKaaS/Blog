<?php
   namespace app\models;
   use Yii;
   use yii\base\Model;
   class RegistrationForm extends Model {
      public $username;
      public $password;
      public $email;
      
      public function rules() {
         return [
            // the username, password, email, country, city, and phone attributes are
            //required
            [['username' ,'password', 'email'], 'required'],
            // the email attribute should be a valid email address
            ['email', 'email'],
         ];
      }
   }
?>