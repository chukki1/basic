<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Invoice_Id')->textInput() ?>

    <?= $form->field($model, 'Product_Id')->textInput() ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <?= $form->field($model, 'Product_Subcatagory_Id')->textInput() ?>

    <?= $form->field($model, 'Product_Subcatagory_main_category_Id')->textInput() ?>

    <?= $form->field($model, 'Product_Subcatagory_Product_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
