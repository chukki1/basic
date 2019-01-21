<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Invoice_Id') ?>

    <?= $form->field($model, 'Product_Id') ?>

    <?= $form->field($model, 'Quantity') ?>

    <?= $form->field($model, 'Product_Subcatagory_Id') ?>

    <?= $form->field($model, 'Product_Subcatagory_main_category_Id') ?>

    <?php // echo $form->field($model, 'Product_Subcatagory_Product_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
