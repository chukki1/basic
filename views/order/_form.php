<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'QR_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quntity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_Price')->textInput() ?>

    <?= $form->field($model, 'Total_Price')->textInput() ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'issued_by')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'Invoice_Id')->textInput() ?>

    <?= $form->field($model, 'Delevery_note_Id')->textInput() ?>

    <?= $form->field($model, 'Customer_Id')->textInput() ?>

    <?= $form->field($model, 'Cashier_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
