<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Discription') ?>

    <?= $form->field($model, 'Suplier') ?>

    <?= $form->field($model, 'Administrator_Id') ?>

    <?= $form->field($model, 'Date') ?>

    <?php // echo $form->field($model, 'Time') ?>

    <?php // echo $form->field($model, 'Item_Id') ?>

    <?php // echo $form->field($model, 'Quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
