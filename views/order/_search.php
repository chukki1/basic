<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'QR_code') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'Quntity') ?>

    <?= $form->field($model, 'Unit_Price') ?>

    <?php // echo $form->field($model, 'Total_Price') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'issued_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'Invoice_Id') ?>

    <?php // echo $form->field($model, 'Delevery_note_Id') ?>

    <?php // echo $form->field($model, 'Customer_Id') ?>

    <?php // echo $form->field($model, 'Cashier_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
