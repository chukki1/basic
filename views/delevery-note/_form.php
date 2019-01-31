<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeleveryNote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delevery-note-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Created_date')->textInput() ?>

    <?= $form->field($model, 'Discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Customer_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Administrator_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
