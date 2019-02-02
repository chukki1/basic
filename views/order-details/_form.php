<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_Id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'Product_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
