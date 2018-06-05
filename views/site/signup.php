
<?php
   use yii\bootstrap\ActiveForm;
   use yii\bootstrap\Html;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "row">
   <div class = "col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'signup']); ?>
         <?= $form->field($model, 'username') ?>
         <?= $form->field($model, 'password')->passwordInput() ?>
         <?= $form->field($model, 'email')->input('email') ?>
        <div class = "form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
               'name' => 'signup-button']) ?>
        </div>
      <?php ActiveForm::end(); ?>
   </div>
</div>