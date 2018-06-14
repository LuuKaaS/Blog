<?php
use yii\helpers\Url;
?>
<?php if(!empty($comments)):?>
    <?php foreach($comments as $comment):?>
        <div class="bottom-comment"><!--bottom comment-->

            <div class="comment-text">
                <?php if($comment->user_id == Yii::$app->user->id):?>
                <a class="replay btn pull-right" href="<?= Url::toRoute(['site/delete', 'id' => $comment->id]); ?>">Delete</a>
                <?php endif;?>
                <h5><?= $comment->user_id ?></h5>

                <p class="comment-date">
                    <?= $comment->date ?>
                </p>


                <p class="para"><?= $comment->text ?></p>
            </div>
        </div>
    <?php endforeach;?>
    
<?php endif;?>
<!-- end bottom comment-->

<?php if(!Yii::$app->user->isGuest):?>
    <div class="leave-comment"><!--leave comment-->
        <h4>Leave a reply</h4>
            <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['site/comment', 'id'=>$article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Post Comment</button>
        
        <?php \yii\widgets\ActiveForm::end();?>
    </div><!--end leave comment-->
<?php endif;?>