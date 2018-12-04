<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Bill_No') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'Product_Name') ?>

    <?=// $form->field($model, 'price') ?>

    <?=// $form->field($model, 'Quantity') ?>

    <?php  //echo $form->field($model, 'Discount') ?>

    <?php // echo $form->field($model, 'Total_Discount') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
