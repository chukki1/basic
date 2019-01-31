<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Reemed_points')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Earned-point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Point_balance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mobile_No')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
