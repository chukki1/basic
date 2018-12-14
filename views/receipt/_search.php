<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReceiptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_it_no') ?>

    <?= $form->field($model, 'Product_Name') ?>

    <?= $form->field($model, 'Price') ?>

    <?= $form->field($model, 'Quantity') ?>

    <?php // echo $form->field($model, 'Discount') ?>

    <?php // echo $form->field($model, 'Total_Discount') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <?php // echo $form->field($model, 'receiptNo_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
