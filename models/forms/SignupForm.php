<?php
   namespace app\models\forms;
   
   use Yii;
   use yii\base\Model;
   use app\models\ActiveRecord\User;

   
   class SignupForm extends Model {
       
      public $name;
      public $password;
      public $email;
      
      public function rules() {
         return [
            // the username, password, email, attributes are
            //required
            [['name' ,'password', 'email'], 'required'],
            // the email attribute should be a valid email address
            [['name'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\ActiveRecord\User', 'targetAttribute'=>'email']
         ];
      }
      
    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            
            return $user->create();
        }
    }
   }
?>