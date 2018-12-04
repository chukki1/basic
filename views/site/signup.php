


<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
   if(Yii::$app->session->hashFlash('success')){ 
      echo "<div class ='alert alert-success'>".Yii::$app->sesion->getFlash('success')."</div>";
   }
?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'address') ?>
                  <?= $form->field($model, 'phoneNo') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
